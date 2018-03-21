# google-citation-helper

Google scholar provides citation information for your published papers. 

I create this repo so that the citation count of your each paper can be easily added to your website

You can go to my publication page to see the effect 

http://huanlezhang.com/publications.php

## How to Use 

1. Move google-citation-helper folder to the home directory of your website

   If you want to move my folder to other places, you need to change `pathToDtcGoogleCitationHelperPhp` in `dtcGoogleCitationHelper.js` to point to `dtcGoogleCitationHelper.php` file. 

2. In your php file, include my script by  

   `<script src="google-citation-helper/dtcGoogleCitationHelper.js"></script>`

   Also make sure you have jQuery included before my script, mine is using 

   ​	`<script src="js/jquery-3.2.1.js"></script>`

   The jQuery version does not matter

3. Replace the URL to your Google Scholar URL. Put following code just before the `</body>` ending tag

   ```
   <script>
   	dtcGoogleCitationCount('your Google Scholar URL here');
   </script>
   ```

4. Add some classes for your paper titles and counts. For your paper title, add class `dtcGooglePaperTitle`, and the place you want to show the citation, add class `dtcGoogleCitationCount`. That's all, see the example below.  Have fun.



## Note

* You need to check the paper title in your Google Scholar and the paper title in your website. I have made paper titles into lowercase alphabetical only. For example, if your paper title in Google Scholar is `Hi, I am an awesome paper`, it converts into `hiiamanawesomepaper`. On your website, your paper will get matched no matter it is `hi, I AM AN aweSOME PAper`, or `HI?    Iam an awesome paper?`. You know what I mean :)

* !!!IMPORTANT: Google Scholar website now blocks web requests without SSL certificates. My personal website still works, but my default local web server fail to work.



## Example

Let's say you have a paper titled "This is an awesome paper" with citation count of 9 on your Google Scholar

In your website php file, 

​	``` <tag1 class="dtcGooglePaperTitle"> ThiS IS aN awesOME PAPER </tag1> ```

and somewhere  you want to show the citation count for the paper

​	```<tag2 class="dtcGoogleCitationCount"> </tag2>```

`tag1` and `tag2` can be any HTML tags, such as `div`, `p`, `span`, etc.  That's all you need to do. The text (i.e., `innerText`) of the `tag2` will change to 9