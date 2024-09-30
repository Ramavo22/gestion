@echo off
echo Début de la copie...

rem Définir les chemins
set source_dir=%~dp0front

:: Modifier selon votre workspace
set target_dir=C:\xampp\htdocs\asa\gestion

rem Créer le dossier de destination s'il n'existe pas
if not exist "%target_dir%" (
    mkdir "%target_dir%"
)

rem Copier les fichiers du dossier front dans le dossier de destination
xcopy /s /e /y "%source_dir%" "%target_dir%"

echo Copie terminée !
