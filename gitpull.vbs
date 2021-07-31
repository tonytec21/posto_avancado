Dim wshShell
Set wshShell = CreateObject("WScript.Shell")

WScript.Sleep(200000)
wshShell.Run "gitpull.bat", 0