<!DOCTYPE html>
<html>
  <head>
    <title> Test Page for Google Scholar Helper </title>
    <!-- change it to your jquery -->
    <script src=jquery-3.4.1.min.js></script>
    <!-- change it -->
    <script src="dtcGoogleScholarHelper.js"></script>
  </head>

  <body>
    <!-- Demo -->

    <p> Citaions all: <span class="dtcGoogleCitationsAll"> -0 </span> </p>
    <p> Citaions recent: <span class="dtcGoogleCitionsRecent"> -0 </span> </p>
    <p> h-index all: <span class="dtcGoogleHIndexAll"> -0 </span> </p>
    <p> h-index recent: <span class="dtcGoogleHIndexRecent"> -0 </span> </p>
    <p> i10-index all: <span class="dtcGoogleI10IndexAll"> -0 </span> </p>
    <p> i10-index recent: <span class="dtcGoogleI10IndexRecent"> -0 </span> </p>

    <p class="dtcGooglePaperTitle"> DopEnc: Acoustic-based Encounter Profiling Using Smartphones </p>
    Citation: <span class="dtcGoogleCitationCount"> -1 </span>

    <p class="dtcGooglePaperTitle"> AIDE: Augmented Onboarding of IoT Devices at Ease </p>
    Citation: <span class="dtcGoogleCitationCount"> -1 </span>


    <script>
      dtcGoogleScholarHelper();
    </script>
  </body>
</html>
