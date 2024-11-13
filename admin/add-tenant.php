<?php include('../includes/header.php') ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="font-weight-bolder">
                        Add Tenant
                        <a href="tenant.php" class="btn btn-danger float-end">
                            <i class="fa fa-angle-left"></i>
                            Back
                        </a>
                    </h5>
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="mb-3">
                            <label for="">First Name</label>
                            <input type="text" name="fname" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="mname">Middle Name</label>
                            <input type="text" name="mname" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="lname">Last Name</label>
                            <input type="text" name="lname" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="contact">Contact Number</label>
                            <input type="text" name="contact" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>

                        <?php
                            include_once("../connection/connection.php");
                            $con = connect();

                            // Fetch units from database
                            $sql = "SELECT * FROM unit";
                            try{
                                $result = $con->query($sql);
                                $count = $result->rowCount();
                        ?>

                        <div class="mb-3">
                            <label for="unit">Unit</label>
                            <select name="unit" class="form-select">
                                <?php
                                        if ($count > 0) {
                                            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                                echo "<option value='" . $row["unitID"] . "'>" . $row["unitID"] . "</option>";
                                            }
                                        } else {
                                            echo "<option value=''>No units available</option>";
                                        }
                                    } catch(PDOException $e) {
                                        echo "An error occurred: " . $e->getMessage();
                                    }
                                ?>
                            </select>

                            <?php
                                $con = null;
                            ?>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary" name="addTenant">Add Tenant</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include('../includes/footer.php') ?>