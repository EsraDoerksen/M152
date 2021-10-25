# Dieses Script fügt einen Fade In auf die Audiodatei hinzu
# 1. Parameter: Dateipfad + Dateiname der hochgeladenen Audiodatei
# 2. Parameter: Der neue Name, welche die neue Audiodatei haben soll

# Es wird geprüft, ob 2 Parameter mitgegeben worden sind
if [ $# -ne 2 ]
then
    # nein -> Fehlermeldung ausgeben
    echo "die Anzahl Parameter stimmt nicht"
    exit 1
fi
# Ordner wird gewechselt
cd uploads
# Hier wird mit -i $1, die hochgeladene Audiodatei als Input definiert. Anschliessend wird mit afade ein Fade In auf die Audiodatei hinzugefügt. $2 ist der Output
ffmpeg -i $1 -af "afade=t=in:st=5:d=5" $2
# Die neue Datei wird in den Ordner "downloads" verschoben
cp $2 ../downloads
# Die Datei im Ordner "uploads" wird gelöscht, da sie nur in den downloads sein soll
rm $2