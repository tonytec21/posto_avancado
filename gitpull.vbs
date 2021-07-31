Dim wshShell
Set wshShell = CreateObject("WScript.Shell")

WScript.Sleep(300000)
wshShell.Run "gitpull.bat", 0