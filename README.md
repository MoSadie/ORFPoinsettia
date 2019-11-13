# Poinsettia Order Form

Runs as a Azure Web App and connects to a Azure SQL DB. Uses IFTTT to send email from the connected acct.
The form is in the `index.html` file.

The config file should be the only file in the /config directory. Name is irrelevant.
Config is split by new lines and looks like this:
```
data_base_username
data_base_password
data_base_hostname
data_base_db_name
table
ifttt_event_code
ifttt_event_key
```
