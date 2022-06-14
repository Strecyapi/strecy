<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Content checker</title>
    <link rel="stylesheet" href="css/index_v2.css">
    <meta name="viewport" content="width=device-width">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/site.webmanifest">
    <link rel="shortcut icon" href="/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#00aba9">
    <meta name="msapplication-config" content="/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
  </head>
  <body>
    <header>
      <nav>
        <a href="#try">Try</a>
        <a href="#use">Use the API</a>
        <a href="#contribute">contribute</a>
      </nav>
    </header>
    <section id="try">
      <h1>An API to check that a sentence or text is safe</h1>
      <h2>Try the API</h2>
      <input required type="text" id="sentence" placeholder="write a sentence"></input>
      <button onclick="send()">Check</button>
      <p id="answer" style="display: none;"></p>
    </section>
    <section id="use">
      <div class="section1">
        <h2>Use the API</h2>
        <p>You can request to the following link by replacing "CONTENT" with your text or phrase to check</p>
        <p>You can use Javascript's "encodeURI" function to encode your text</p>
        <p class="code">https://www.strecy.com/check.php?msg=CONTENT</p>
      </div>
      <div class="section2">
        <h2>Response format</h2>
        <p>Here are the different answers (the number) :</p>
        <ul>
          <li>0 - content may be suitable</li>
          <li>1 - content may not be suitable (Sexual content)</li>
          <li>2 - content may not be suitable (Shocking content)</li>
          <li>3 - content may not be suitable (Illegal activity)</li>
          <li>4 - content may not be suitable (Violence content)</li>
        </ul>
        <p>If there are several possible answers, the largest number will be sent.</p>
      </div>
    </section>
    <section id="contribute">
      <h2>Contribute to a safer internet</h2>
      <div class="finalsection">
        <div class="section3">
          <h3>Adding sensitive words</h3>
          <p>You can simply contribute by adding sensitive words to the database.</p>
          <input type="text" name="add" id="add"></input>
          <select id="select">
            <option value="1">Sexual content</option>
            <option value="2">Shocking content</option>
            <option value="3">Illegal activity</option>
            <option value="4">Violent content</option>
          </select>
          <button onclick="sendnew()">Send new word</button>
          <p id="addnew" style="display: none;"></p>
        </div>
        <div class="section4">
          <h3>Improving the code</h3>
          <p>The engine is open source and you can improve it whenever you want</p>
          <p class="git"><a href="https://github.com/Strecyapi/strecy">Go on GitHub</a>
        </div>
      </div>
    </section>
    <footer>
      
    </footer>
  </body>
</html>
<script type="text/javascript">
  function send() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("answer").style.display = "block";
        if(parseInt(this.responseText)==1) {
          document.getElementById("answer").innerHTML = "content may not be suitable (Sexual content)";
        }
        else if(parseInt(this.responseText)==2) {
          document.getElementById("answer").innerHTML = "content may not be suitable (Shocking content)";
        }
        else if(parseInt(this.responseText)==3) {
          document.getElementById("answer").innerHTML = "content may not be suitable (Illegal activity)";
        }
        else if(parseInt(this.responseText)==4) {
          document.getElementById("answer").innerHTML = "content may not be suitable (Violence content)";
        } else {
          document.getElementById("answer").innerHTML = "content may be suitable";
        }
      }
    };
    xhttp.open("GET", "check.php?msg="+encodeURI(document.getElementById("sentence").value), true);
    xhttp.send();
  }

  function sendnew() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("addnew").style.display = "block";
        if(parseInt(this.responseText)==1) {
          document.getElementById("addnew").innerHTML = "the word has been added to the waiting list";
        } else if (parseInt(this.responseText)==2) {
          document.getElementById("addnew").innerHTML = "the word is already in the waiting list";
        } else if(parseInt(this.responseText)==3){
          document.getElementById("addnew").innerHTML = "the word is already a sensitive word";
        } else {
          document.getElementById("addnew").innerHTML = "an error has occurred";
        }
      }
    };
    xhttp.open("GET", "add.php?msg="+encodeURI(document.getElementById("add").value)+"&value="+encodeURI(document.getElementById('select').selectedIndex), true);
    xhttp.send();
  }
</script>
<script   src="https://code.jquery.com/jquery-3.6.0.js"   integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="   crossorigin="anonymous"></script>
<script>
  jQuery($ => {
    // The speed of the scroll in milliseconds
    const speed = 750;

    $('a[href*="#"]')
      .filter((i, a) => a.getAttribute('href').startsWith('#') || a.href.startsWith(`${location.href}#`))
      .unbind('click.smoothScroll')
      .bind('click.smoothScroll', event => {
        const targetId = event.currentTarget.getAttribute('href').split('#')[1];
        const targetElement = document.getElementById(targetId);

        if (targetElement) {
          event.preventDefault();
          $('html, body').animate({ scrollTop: $(targetElement).offset().top }, speed);
        }
      });
  });
</script>