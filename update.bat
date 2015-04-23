echo off
cls
:loop
C:\Users\User\AppData\Local\GitHub\PortableGit_c2ba306e536fdf878271f7fe636a147ff37326ad\cmd\git.exe status
C:\Users\User\AppData\Local\GitHub\PortableGit_c2ba306e536fdf878271f7fe636a147ff37326ad\cmd\git.exe add -A
C:\Users\User\AppData\Local\GitHub\PortableGit_c2ba306e536fdf878271f7fe636a147ff37326ad\cmd\git.exe commit -m "update"
C:\Users\User\AppData\Local\GitHub\PortableGit_c2ba306e536fdf878271f7fe636a147ff37326ad\cmd\git.exe pull origin master
C:\Users\User\AppData\Local\GitHub\PortableGit_c2ba306e536fdf878271f7fe636a147ff37326ad\cmd\git.exe push origin master
C:\Users\User\AppData\Local\GitHub\PortableGit_c2ba306e536fdf878271f7fe636a147ff37326ad\cmd\git.exe status
echo git again?
pause
goto loop