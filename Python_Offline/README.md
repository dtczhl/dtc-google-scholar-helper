## Demo



## Configurations

1.  Configure Python envioronment to run `main.py`. You need to install `selenium` package, and download `ChromeDriver` <https://sites.google.com/a/chromium.org/chromedriver/downloads>.

2.  In `main.py`, replace `google_scholar_url` to your Google Scholar and `chrome_driver_path` to the downloaded ChromeDriver. After successfully run it, a `google_scholar_citation.txt` file is generated
    ```python
    # url to your Google Scholar
    google_scholar_url = "https://scholar.google.com/citations?user=Xm4NYnsAAAAJ&hl=en&oi=ao"
    # ChromeDriver path
    chrome_driver_path = "./chromedriver"
    ```

3.  In your web page, add jQuery. The version should be irrelevant. I am using 3.4.1
    ```xml
    <script src=jquery-3.4.1.min.js></script>
    ```

4.  Include `dtcGoogleScholarHelper.js` of this repo.
    ```xml
    <script src="dtc-google-scholar-helper/Python_Offline/dtcGoogleScholarHelper.js"> </script>
    ```

5.  Call the following function in you PhP file.
    ```xml
    <script>
      dtcGoogleScholarHelper();
    </script>
    ```

6.  In `dtcGoogleScholarHelper.js`, you only need to change `pathToGoogleScholarCitationTxt` variable to the path of the `google_scholar_citation.txt`.


### Example Configurations

As an example, if you copy this repository to the root folder of your website, you make the following changes.

In `dtcGoogleScholarHelper.js`
```javascript
pathToGoogleScholarCitationTxt: "dtc-google-scholar-helper/Python_Offline/google_scholar_citation.txt"
```

### Reference
*   Introduction to Web Scraping using Selenium. <https://medium.com/the-andela-way/introduction-to-web-scraping-using-selenium-7ec377a8cf72>
