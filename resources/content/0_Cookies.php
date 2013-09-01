<style scoped>
    form {
        margin: 0 auto;
        display: inline-block;
    }
    [type=submit] {
        height: 150px;
        width: 150px;
        background-image: url('/<?=GRAPHICS?>/item/milk.png');
        cursor: pointer;
    }
    div.gray {
        background-color: rgba(200, 200, 200, 0.4);
        padding: 5px;
        border-radius: 10px;
    }
    h3 {
        margin-top: 0;
    }
    p {
        margin-bottom: 0;
    }
</style>
<h2>Cookies on UDSMinecraft.com</h2>
<div class='thin gray'>
    <h3>What are cookies?</h3>
    <p>
        Cookies are small files that a website places on your computer. These
        files contain bits of information about a variety of things. To learn
        more visit the <a href='http://en.wikipedia.org/wiki/HTTP_cookie'>Wikipedia article</a>
        on cookies.
    </p>
</div>
<div class='thin gray'>
    <h3>Are they dangerous?</h3>
    <p class='center'>
        Only if you eat to many.
    </p>
    <p>
        Generally cookies aren't dangerous and neither are ours. We use our
        cookies to track your use of the site and to make sure the correct
        content is delivered to you.
    </p>
    <p>
        <span class='cmd'>
            No personal or private data is stored to or read from your computer.
        </span>
    </p>
    </div>
<div class='thin gray'>
    <h3>How do I hide the cookie in the corner of the screen, it's making me hungry!</h3>
    <p>
        Thanks for reading this page, to hide the delicious cookie and agree to
        our use of cookies click the bucket of milk below.
    </p>
</div>
<div class='thin gray'>
    <form action='/' method='post' class='strip'>
        <!-- Begin PHP -->
    <?php HTML::echoButton("", "home", "", "cookie");?>
        <!-- End PHP -->
    </form>
</div>
<hr>