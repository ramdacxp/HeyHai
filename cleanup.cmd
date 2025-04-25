@echo off

call :delete .astro
call :delete dist
if "%1" == "all" call :delete node_modules
if "%1" == "/all" call :delete node_modules
if "%1" == "/a" call :delete node_modules
goto :eof

rem ============================================================================
:delete
echo Deleting %1 ...
if exist %1 rmdir /s /q %1
goto :eof
