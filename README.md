# dtc-google-scholar-helper

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
&nbsp;
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/7c94dab58b144ce8a6c9ab808e2411ad)](https://www.codacy.com/app/dtczhl/dtc-google-citation-helper?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=dtczhl/dtc-google-citation-helper&amp;utm_campaign=Badge_Grade)

Google scholar provides useful information for e.g, citations for your papers.

This repo can be used to extract information from your Google Scholar and display them in your personal website.

You can go to my web page to have a brief idea of it.

<https://huanlezhang.com/publications.php>

## Configurations

In your web pages, make the following changes. Refer to the sample `testPage.php`.

1.  jQuery is required. The version should be irrelevant. I am using 3.4.1
```xml
<script src=jquery-3.4.1.min.js></script>
```

2.  Include `dtcGoogleScholarHelper.js` of this repo.
```xml
<script src="dtcGoogleScholarHelper.js"></script>
```

3.  Replace the URL to your Google Scholar.
```xml
<script>
  dtcGoogleScholarHelper('https://scholar.google.com/citations?user=Xm4NYnsAAAAJ&hl=en');
</script>
```

In `dtcGoogleScholarHelper.js`, you only need to change `pathToDtcGoogleScholarHelperPhp` variable to the path of the `dtcGoogleScholarHelper.php`.

Note: install SSL if `testPage.php` does not work.

#### Example Configurations

As an example, if you copy this repository to the root folder of your website, you make the following changes.

In `dtcGoogleScholarHelper.js`
```
pathToDtcGoogleScholarHelperPhp: "dtc-google-scholar-helper/dtcGoogleScholarHelper.php"
```


## Interfaces

`.innerText` is changed according to the class name.

*   `dtcGoogleCitationsAll`: total citation counts
*   `dtcGoogleCitationsRecent`: total citations counts in recent 5 years
*   `dtcGoogleHIndexAll`: h-index of all citations
*   `dtcGoogleHIndexRecent`: h-index of citations in recent 5 years
*   `dtcGoogleI10IndexAll`: i10-index of all citations
*   `dtcGoogleI10IndexRecent`: i10-index of citations in recent 5 years

For each paper and its citation, you need to use two class names in pair.
*   `dtcGooglePaperTitle`: your paper title
*   `dtcGoogleCitationCount`: the place you want to show its citation count

You need to check the paper title in your Google Scholar and the paper title in your website. I have made paper titles into lowercase alphabetical only. For example, if your paper title in Google Scholar is `Hi, I am an awesome paper`, it converts into `hiiamanawesomepaper`. On your website, your paper will get matched no matter it is `hi, I AM AN aweSOME PAper`, or `HI?    Iam an awesome paper?`. You know what I mean :)
