from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.metrics.pairwise import cosine_similarity
import numpy as np
import pymysql
import sys
import json

# Verbindung zur Datenbank herstellen
connection = pymysql.connect(host="localhost", user="root", password="", database="web-technologie")
cursor = connection.cursor()

# Benutzer, der gerade eingeloggt ist
eingeloggter_benutzer_id = int(sys.argv[1])

# Alle Benutzerprofile und -IDs aus der Datenbank abrufen, mit denen der Benutzer nicht befreundet ist
cursor.execute("""
    SELECT b.benutzer_id, b.profile_informationen
    FROM benutzer b
    LEFT JOIN freundschaft f ON (b.benutzer_id = f.fk_benutzer_id1 OR b.benutzer_id = f.fk_benutzer_id2)
    AND (%s = f.fk_benutzer_id1 OR %s = f.fk_benutzer_id2)
    WHERE f.freundschaft_id IS NULL AND b.benutzer_id != %s
""", (eingeloggter_benutzer_id, eingeloggter_benutzer_id, eingeloggter_benutzer_id))

benutzerprofile = cursor.fetchall()

# Profile in eine Liste extrahieren
profile_texts = [profile[1] for profile in benutzerprofile]

# Das Profil des eingeloggten Benutzers extrahieren
cursor.execute("SELECT profile_informationen FROM benutzer WHERE benutzer_id = %s", (eingeloggter_benutzer_id,))
eingeloggter_benutzer_profil = cursor.fetchone()[0]

# TfidfVectorizer initialisieren
vectorizer = TfidfVectorizer()

# Vektorraum erstellen
vectors = vectorizer.fit_transform([eingeloggter_benutzer_profil] + profile_texts)


# Ähnlichkeitsmatrix aufbauen
similarity_matrix = cosine_similarity(vectors)

# Ergebnisse
similarities_with_logged_in_user = similarity_matrix[0][1:]

# Benutzer-IDs sortiert nach Ähnlichkeit in absteigender Reihenfolge erhalten
sorted_user_ids = np.argsort(similarities_with_logged_in_user)[::-1]

# Freundeempfehlung
max_freundeempfehlung_size = 15
freundeempfehlung_result = [benutzerprofile[i][0] for i in sorted_user_ids[:max_freundeempfehlung_size]]

# Ausgabe der Freundeempfehlung
print(json.dumps({"freundeempfehlung": freundeempfehlung_result}))

# Verbindung schließen
cursor.close()
connection.close()
