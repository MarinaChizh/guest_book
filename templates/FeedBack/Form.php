<div class="formPosition">
<h1>FeedBack</h1>
<form action="<?= $formPath ?>" method="post" class="feedBackForm">
<div class="form-group">
    <input type="text" name="nick" placeholder="Enter your name" class="form-control"><br>
    </div>
    <div class="form-group">
    <textarea name="message" cols="30" rows="10" class="form-control">Enter your message</textarea><br>
    </div>
    <div class="form-group">
    <select name="mark" class="form-control">
        <option value='1'>1</option>
        <option value='2'>2</option>
        <option value='3'>3</option>
        <option value='4'>4</option>
        <option value='5'>5</option>
    </select>
    </div>
    <div class="form-group">
    <input type="submit" value="send" class="feedBackButton btn btn-primary">
    </div>
    

</form>
</div>
<div class='login'>
    <a href='/login' class="btn btn-primary btn-sm">Login</a>
</div>