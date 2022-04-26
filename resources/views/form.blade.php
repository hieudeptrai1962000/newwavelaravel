<form method="POST" action="/num">
    <div>
        <input type="text" name="username" placeholder="nhap">
            <input type="hidden" name="_method" value="POST" />
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    </div>
    <button type="submit">Submit</button>
</form>
<form method="POST" action="/per">
    <div>
        <input type="text" name="username" placeholder="nhap">
        <input type="hidden" name="_method" value="POST" />
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    </div>
    <button type="submit">Submit2</button>
</form>
