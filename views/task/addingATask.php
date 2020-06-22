<form method="POST" class="d-flex flex-column align-items-center mt-5">
    <input class="w-25 mb-1" name="Name" type="text" placeholder="The name of the task" required>
    <textarea name="Description" type="text" cols="80" rows="10" placeholder="Task" required></textarea>
    <button type="submit" class="btn btn-primary mt-3 w-25">Submit</button>
</form>
<div class="d-flex flex-column align-items-center w-100">
    <a class="btn btn-success w-50 mt-5" href="http://<?=$_SERVER['HTTP_HOST']?>/home/index">Go to Home</a>
</div>
