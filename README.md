# google-citation-helper

Google scholar provides citation information for your published papers. 

I create this repo so that the citation count of your each paper can be easily add to your website

You can go to my publication page to see the effect 

http://huanlezhang.com/publications.php

## How to Use 

1. Move google-citation-helper to your home folder of website

   If you want to move my folder to other places, you need to change `pathToDtcGoogleCitationHelperPhp` in `dtcGoogleCitationHelper.js` to point to `dtcGoogleCitationHelper.php` file. 

2. In your php file, include my script by  

   `<script src="google-citation-helper/dtcGoogleCitationHelper.js"></script>`

   Also make sure you have jQuery included before my script, mine is using 

   ​	`<script src="js/jquery-3.2.1.js"></script>`

3. Replace the URL to your google scholar URL. Put following code before `</body>` tag

   ```
   <script>
   	dtcGoogleCitationCount('your url here');
   </script>
   ```

4. Add some class. For your paper title, add class `dtcGooglePaperTitle`, and the place you want to show the citation, add class `dtcGoogleCicationCount`. That's all, have fun.



## Note

* You need to check the paper title in your google scholar and the paper title in your website. I have made paper titles into lowercase alphabetical only. For example, if your paper title in Google Scholar is `Hi, you! How are you???`, it converts into `hiyouhowareyou`. In your website, your paper will get matched no matter it is `hi, you how are You`, or `HI~YOU~How   are   you?!?!`. You know what I mean.



## Example

Let's say you have a paper titled "This is an awesome paper" with citation count of 9 on your Google Scholar

In your website php file, 

​	``` <sometag class="dtcGooglePaperTitle"> THIS IS AN AWESOME PAPER </sometag> ```

and somewhere 

​	```<anytag class="dtcGoogleCicationCount"> </anytag>```

That's all you need to do. The text (i.e., `innerText`) of the `anytag` will change to 9