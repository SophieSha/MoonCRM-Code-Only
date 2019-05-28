<div class="d-flex mx-2 my-2 border">
    <div class="card border-light mb-3 w-100">
        <div class="card-header d-flex flex-row justify-content-between">
            <h4><?php echo "{$card['title']}"; ?></h4>

            <div class="dropdown">

                <i class="fas fa-sort-down fa-2x" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Edit</a>
                    <div class="dropdown-divider" href="#"></div>
                    <a class="dropdown-item" href="#">Remove</a>
                </div>
            </div>

        </div>
        <div class="card-body d-flex flex-row">
            <div class="flex-fill"><img data-src="holder.js/200x200" class="img-thumbnail float-left mr-3" alt="200x200" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22200%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20200%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16ab4e13755%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16ab4e13755%22%3E%3Crect%20width%3D%22200%22%20height%3D%22200%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2274.421875%22%20y%3D%22104.396875%22%3E200x200%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 200px; height: 200px;"></div>
            <div class="w-25">
                <h6>Description Heading</h6>
                <p><?php echo "{$card['description']}" ?></p>
            </div>
            <div class="w-25 ml-4 pl-4">
                <form method="POST">
                    <h6>Visible To:</h5>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="options[]" id="" value="sales"<?php if(array_search("sales",$_POST['options']) !== FALSE ){echo "checked";} ?>>
                                Sales
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="options[]" id="" value="marketing" <?php if(array_search("marketing",$_POST['options']) !== FALSE ){echo "checked";} ?>>
                                Marketing
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="options[]" id="" value="finance" <?php if(array_search("finance",$_POST['options']) !== FALSE ){echo "checked";} ?>>
                                Finance
                            </label>
                        </div>

            </div>
            <div class="w-25 align-self-end text-right mr-4 mb-2">
                <a data-toggle="modal" data-target="#myModal"><button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button></a>
            </div>
            </form>
        </div>
    </div>
</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body text-center">
        <h1 class="p-4">The "<?php echo "{$card['title']}";?>" card has been updated.</h1>
      </div>
    </div>

  </div>
</div>

<?php
if (isset($_POST['options'])) {
    $results = $_POST['options'];
    // $sql = "SELECT * from card";
    // if ($result = mysqli_query($link, $sql)) {
    //     $row = mysqli_fetch_assoc($result);
        
        $financeSet = 0;
        $salesSet = 0;
        $marketingSet = 0;
    // }
    if (array_search("sales",$results) !== FALSE) {
        $salesSet = 1;
    } else {
        $salesSet = 0;
    }

    if (array_search("marketing",$results) !== FALSE) {
        $marketingSet = 1;
    } else {
        $marketingSet = 0;
    }

    if (array_search("finance",$results) !== FALSE) {
        $financeSet = 1;
    } else {
        $financeSet = 0;
    }

    $sql2 = "UPDATE card SET isFinance=$financeSet,isSales=$salesSet, isMarketing=$marketingSet WHERE card_id = 1";
    $link->query($sql2);



}


?>