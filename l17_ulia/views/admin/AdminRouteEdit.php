<?php
  require_once ROOT."/views/admin/header.php";
?>
     <h1><?php echo $title; ?></h1>
    <div class="container">
    <div class="row">
        <div class="col-xs-1 col-sm-1 col-md-2 col-lg-3"></div>
        <div class="col-xs-10 col-sm-10 col-md-8 col-lg-6 create-station">
            <h1 class="text-center"><?php echo $title; ?></h1>
            <form class="form-horizontal" role="form" method="post">
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">name_start</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name_start" placeholder="Ввести назву" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">name_end</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name_end" placeholder="Ввести назву" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">number</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="number" placeholder="Ввести назву" required>
                    </div>
                </div>
                <div class="alert-warning">
                    Зробити випадаючим списком
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">carriage_id</label>
                    <div class="col-sm-9">

                                            
                       
                        <input type="text" class="form-control" id="name" name="carriage_id" placeholder="Ввести назву" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <h2>Рух за прямим маршрутом</h2>
                        <table class="table">
                            <tr>
                                <th>№</th>
                                <th>Зупинка</th>
                                <th>Різниця часу</th>
                                <th></th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>
                                    <select name="id_stations_start[]" class="form-control">
                                        <option value="1">Зупинка 1</option>
                                        <option value="2">Зупинка 2</option>
                                        <option value="3">Зупинка 3</option>
                                        <option value="4">Зупинка 4</option>
                                        <option value="5">Зупинка 5</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="delta_time_start[]">
                                </td>
                                <td><button>X</button></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>
                                    <select name="id_stations_start[]" class="form-control">
                                        <option value="1">Зупинка 1</option>
                                        <option value="2">Зупинка 2</option>
                                        <option value="3">Зупинка 3</option>
                                        <option value="4">Зупинка 4</option>
                                        <option value="5">Зупинка 5</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="delta_time_start[]">
                                </td>
                                <td><button>X</button></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>
                                    <select name="id_stations_start[]" class="form-control">
                                        <option value="1">Зупинка 1</option>
                                        <option value="2">Зупинка 2</option>
                                        <option value="3">Зупинка 3</option>
                                        <option value="4">Зупинка 4</option>
                                        <option value="5">Зупинка 5</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="delta_time_start[]">
                                </td>
                                <td><button>X</button></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>
                                    <select name="id_stations_start[]" class="form-control">
                                        <option value="1">Зупинка 1</option>
                                        <option value="2">Зупинка 2</option>
                                        <option value="3">Зупинка 3</option>
                                        <option value="4">Зупинка 4</option>
                                        <option value="5">Зупинка 5</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="delta_time_start[]">
                                </td>
                                <td><button>X</button></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>
                                    <select name="id_stations_start[]" class="form-control">
                                        <option value="1">Зупинка 1</option>
                                        <option value="2">Зупинка 2</option>
                                        <option value="3">Зупинка 3</option>
                                        <option value="4">Зупинка 4</option>
                                        <option value="5">Зупинка 5</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="delta_time_start[]">
                                </td>
                                <td><button>X</button></td>
                            </tr>

                        </table>
                        <button>
                            Додати ще одну зупинку
                        </button>

                    </div>
                    <div class="col-md-6">
                        <h2>Рух за зворотнім маршрутом</h2>
                        <table class="table">
                            <tr>
                                <th>№</th>
                                <th>Зупинка</th>
                                <th>Різниця часу</th>
                                <th></th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>
                                    <select name="id_stations_end[]" class="form-control">
                                        <option value="1">Зупинка 1</option>
                                        <option value="2">Зупинка 2</option>
                                        <option value="3">Зупинка 3</option>
                                        <option value="4">Зупинка 4</option>
                                        <option value="5">Зупинка 5</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="delta_time_end[]">
                                </td>
                                <td><button>X</button></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>
                                    <select name="id_stations_end[]" class="form-control">
                                        <option value="1">Зупинка 1</option>
                                        <option value="2">Зупинка 2</option>
                                        <option value="3">Зупинка 3</option>
                                        <option value="4">Зупинка 4</option>
                                        <option value="5">Зупинка 5</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="delta_time_end[]">
                                </td>
                                <td><button>X</button></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>
                                    <select name="id_stations_end[]" class="form-control">
                                        <option value="1">Зупинка 1</option>
                                        <option value="2">Зупинка 2</option>
                                        <option value="3">Зупинка 3</option>
                                        <option value="4">Зупинка 4</option>
                                        <option value="5">Зупинка 5</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="delta_time_end[]">
                                </td>
                                <td><button>X</button></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>
                                    <select name="id_stations_end[]" class="form-control">
                                        <option value="1">Зупинка 1</option>
                                        <option value="2">Зупинка 2</option>
                                        <option value="3">Зупинка 3</option>
                                        <option value="4">Зупинка 4</option>
                                        <option value="5">Зупинка 5</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="delta_time_end[]">
                                </td>
                                <td><button>X</button></td>
                            </tr>
                        </table>
                        <button>
                            Додати ще одну зупинку
                        </button>

                    </div>
                </div>


                <input type="hidden" name="typeform" value="editRoute">
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <input name="editRoute" type="submit" class="btn btn-warning">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-xs-1 col-sm-1 col-md-2 col-lg-3"></div>
    </div>
</div>



<?php
  require_once ROOT."/views/admin/footer.php";
?>

