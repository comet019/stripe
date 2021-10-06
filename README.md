# Stripe MCC -> JSON
# Sort stripes MCC List into json file.

# STEPS
Stripe MCC List -> https://stripe.com/docs/connect/setting-mcc

1. Copy MCC list to "sort.txt" then run scipt
2. Delete sort.php
3. Go To 'example.html'


sort.php sorts the list into a json file called StripeMCC.json.

example.html fetches this file then creates OPTION elements inside the SELECT element.
