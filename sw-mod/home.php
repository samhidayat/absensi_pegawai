<?php 
if ($mod ==''){
    header('location:../404');
    echo'kosong';
}else{
    include_once 'sw-mod/sw-header.php';
if(!isset($_COOKIE['COOKIES_MEMBER'])){
 echo'
 <!-- App Capsule -->
    <div id="appCapsule">

        <div class="section mt-2 text-center">
            <h1>Masuk</h1>
            <h4>Lengkapi data login Anda</h4>
        </div>
        <div class="section mb-5 p-2">

            <form id="form-login">
                <div class="card">
                    <div class="card-body pb-1">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="email1">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail Anda">
                                <i class="clear-input"><ion-icon name="close-circle"></ion-icon></i>
                            </div>
                        </div>
        
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password1">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Kata sandi Anda">
                                <i class="clear-input"><ion-icon name="close-circle"></ion-icon></i>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-links mt-2">
                   <!-- <div>
                        <a href="registrasi">Mendaftar</a>
                    </div>
                    <div><a href="forgot" class="text-muted">Lupa Password?</a></div> -->
                </div>

               <div class="form-button-group  transparent">
                   <button type="submit" class="btn btn-primary btn-block"><ion-icon name="log-in-outline"></ion-icon> Masuk</button>
                  <!--  <a href="oauth/google" class="btn btn-danger btn-block"><ion-icon name="logo-google"></ion-icon> Masuk Dengan Google</a>-->
                </div>

            </form>
        </div>

    </div>
    <!-- * App Capsule -->';}
  else{
  echo'<!-- App Capsule -->
    <div id="appCapsule">
        <!-- Wallet Card -->
        <div class="section wallet-card-section pt-1">
            <div class="wallet-card">
                <!-- Balance -->
                <div class="balance">
                    <div class="left">
                        <span class="title"> Selamat '.$salam.'</span>
                        <h1 class="total">'.ucfirst($row_user['employees_name']).'</h1>
                    </div>
                </div>
                <!-- * Balance -->
                <!-- Wallet Footer -->
                <div class="wallet-footer">
                    <div class="item">
                        <a href="#" dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                            <div class="icon-wrapper bg-danger">
                                <ion-icon name="camera-outline"></ion-icon>
                            </div>
                            <strong>Absen</strong>
                        </a>
                        <div class="dropdown-menu" x-placement="bottom-start">';
                        $query_building  ="SELECT building_id,name FROM building ORDER BY name ASC";
                        $result_building = $connection->query($query_building);
                        while ($row_building = $result_building->fetch_assoc()) {
                          echo'<a class="dropdown-item" href="./absent&building='.epm_encode($row_building['building_id']).'"><ion-icon name="map"></ion-icon> '.$row_building['name'].'</a>';
                        }
                        echo'
                    </div>
                    </div>
                   
                    <div class="item">
                        <a href="./history">
                            <div class="icon-wrapper bg-success">
                               <ion-icon name="document-text-outline"></ion-icon>
                            </div>
                            <strong>Rekap Absen</strong>
                        </a>
                    </div>

                    <!-- <div class="item">
                        <a href="./id-card">
                            <div class="icon-wrapper bg-primary">
                               <ion-icon name="id-card-outline"></ion-icon>
                            </div>
                            <strong>ID Card</strong>
                        </a>
                    </div> -->

                    <div class="item">
                        <a href="./profile">
                            <div class="icon-wrapper bg-warning">
                               <ion-icon name="person-outline"></ion-icon>
                            </div>
                            <strong>Profil</strong>
                        </a>
                    </div>

                </div>
                <!-- * Wallet Footer -->
            </div>
        </div>
        <!-- Wallet Card -->

      <div class="section mt-2 mb-2">
            <div class="section-title">1 Minggu Terakhir</div>
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-dark rounded bg-primary">
                        <thead>
                            <tr>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Jam Masuk</th>
                                <th scope="col">Jam Pulang</th>
                            </tr>
                        </thead>
                        <tbody>';
                        $query_absen="SELECT presence_date,time_in,time_out FROM presence WHERE MONTH(presence_date) ='$month' AND employees_id='$row_user[id]' ORDER BY presence_id DESC LIMIT 6";
                        $result_absen = $connection->query($query_absen);
                        if($result_absen->num_rows > 0){
                            while ($row_absen= $result_absen->fetch_assoc()) {
                            echo'
                            <tr>
                                <th scope="row">'.tgl_ind($row_absen['presence_date']).'</th>
                                <td>'.$row_absen['time_in'].'</td>
                                <td>'.$row_absen['time_out'].'</td>
                            </tr>';
                        }}
                        echo'
                        </tbody>
                    </table>
                </div>
            </div>
        </div>   
    </div>
    <!-- * App Capsule -->';
    }
  include_once 'sw-mod/sw-footer.php';
} ?>