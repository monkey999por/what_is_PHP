cd $PSScriptRoot
get httpd
$apache = Get-Clipboard |Split-Path -Parent
$htdocs = Join-Path $apache htdocs
$htdocs
if (Test-Path $htdocs){
    Copy-Item -Path C:\develop\js_work\content\* $htdocs -Force -Recurse
}




