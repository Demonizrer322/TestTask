<div class="d-flex flex-column align-items-center">
<?php
    if(!empty($userRole))
    {
?>
        <a href="http://<?=$_SERVER['HTTP_HOST']?>/task/addingATask" class="btn btn-secondary w-25 m-2">Add a new task</a>
<?php
    }
?>
    <div class="d-flex bg-light border mt-3 mb-3 w-50 justify-content-around align-items-center">
        Sort by:
        <div class="dropdown show">
            <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                UserName
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="/home/index?sortby=UserName&direction=ASC">Ascending</a>
                <a class="dropdown-item" href="/home/index?sortby=UserName&direction=DESC">Descending</a>
            </div>
        </div>
        <div class="dropdown show">
            <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Email
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="/home/index?sortby=Email&direction=ASC">Ascending</a>
                <a class="dropdown-item" href="/home/index?sortby=Email&direction=DESC">Descending</a>
            </div>
        </div>
        <div class="dropdown show">
            <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Status
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="/home/index?sortby=Status&direction=ASC">Ascending</a>
                <a class="dropdown-item" href="/home/index?sortby=Status&direction=DESC">Descending</a>
            </div>
        </div>
    </div>
    <?php
        foreach($model as $row)
        {
    ?>
            <div class="d-flex flex-column h-50 w-50 border border-dark mb-5">
                <div class="d-flex justify-content-between pl-2 pr-2 border border-dark">
                    <div>Name: <?=$row->Name?></div>
                    <div>Status: <?=$row->Status?></div>
                </div>
                <div class="pl-2 pr-2 border border-dark">Written by: <span class="font-weight-bold"><?=$row->Email?> - <?=$row->UserName?></span></div>
                <div class="pl-2 pr-2 border border-dark"><?=$row->Description?></div>
            <?php
                if($userRole->Role == "Admin")
                {
            ?>
                    <form method="GET" class="w-25 mr-5 ml-auto">
                        <a href="/task/taskEdit?TaskId=<?=$row->TaskId?>" class="btn btn-primary w-100">Change</a>
                    </form>
            <?php
                } else {
                    echo('');
                }
            ?>
            </div>
    <?php
        }
    ?>
</div>