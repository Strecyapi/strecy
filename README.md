# Strecy

[Strecy](https:/www.strecy.com) is an API to check that a sentence or text is safe or not. The API will score the text between 0 and 4 in order to know if the text is safe. For more informations check the website.
## Text recognition not sure

The API will return the following ints based on the text content :

* 0 : content may be suitable
* 1 : content may not be suitable (Sexual content)
* 2 : content may not be suitable (Shocking content)
* 3 : content may not be suitable (Illegal activity)
* 4 : content may not be suitable (Violence content)

## Use the API

You can request to the following link by replacing "CONTENT" with your text or phrase to check.

You can use Javascript's "encodeURI" function to encode your text.

```url
https://www.strecy.com/check.php?msg=CONTENT
```

## Contributing
You can simply contribute by adding sensitive words to the database. [Check the website](https:/www.strecy.com).

You can also improve the API or the website on GitHub.


### Database access

All content is stored in a private database. The username and password of the database are put in the file "sensitive_data.php" (not included in repository). Here is an example of a "sensitive_data.php" file

```php
<?php
$db = "db";
$user = "user";
$psw = "psw";
?>
```

### Database structure

The database is separated into two tables : waiting_list and bad_words.

waiting_list contains words awaiting approval. Here is its structure :
* id : int corresponding to the id of the word (autoincrement and starting at 0)
* word : text corresponding to the word
* category : int corresponding to the category of the word (see above)

bad_words contains words approval. Here is its structure :
* id : int corresponding to the id of the word (autoincrement and starting at 0)
* word : text corresponding to the sensitive word
* strength : int corresponding to the category of the word (see above)