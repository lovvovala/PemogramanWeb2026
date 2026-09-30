@echo off
cd /d "%~dp0"
start http://localhost:8000/index.php
"C:\laragon\bin\php\php-8.3.33-Win32-vs16-x64\php.exe" -S localhost:8000