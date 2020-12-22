## Demo

Try `testPage.php` first. It should run out of the box.

Note: install SSL if `testPage.php` does not work.


## Configurations

In your web pages, make the following changes. Refer to the sample `testPage.php`.

1.  jQuery is required. The version should be irrelevant. I am using 3.4.1
```xml
<script src=jquery-3.4.1.min.js></script>
```

2.  Include `dtcGoogleScholarHelper.js` of this repo.
```xml
<script src="dtc-google-scholar-helper/Php_Standalone/dtcGoogleScholarHelper.js"> </script>
```

3.  Replace the URL to your Google Scholar.
```xml
<script>
  dtcGoogleScholarHelper('https://scholar.google.com/citations?user=Xm4NYnsAAAAJ&hl=en');
</script>
```

4.  In `dtcGoogleScholarHelper.js`, you only need to change `pathToDtcGoogleScholarHelperPhp` variable to the path of the `dtcGoogleScholarHelper.php`.


### Example Configurations

As an example, if you copy this repository to the root folder of your website, you make the following changes.

In `dtcGoogleScholarHelper.js`
```javascript
pathToDtcGoogleScholarHelperPhp: "dtc-google-scholar-helper/Php_Standalone/dtcGoogleScholarHelper.php"
```
