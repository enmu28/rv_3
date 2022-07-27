@extends("shop/index")
@section('contain')
    Trang chủ &emsp;>>&emsp; Liên hệ
    <hr style="color: lightblue;">
    <div class="row">
        <div class="col-12 col-md-6">
            <b>Gửi tin nhắn cho chúng tôi</b><br><br>
            <input type="text" class="form-control" placeholder="Họ tên *" id="ho_ten" width="100%"><Br>
            <input type="text" class="form-control" placeholder="Email *" id="email" width="100%"><br>
            <input type="text" class="form-control" placeholder="Địa chỉ *" id="dia_chi" width="100%"><br>
            <input type="text" class="form-control" placeholder="Số điện thoại *" id="sdt" width="100%"><Br>
            <textarea class="form-control" placeholder="Nội dung *" id="noi_dung" width="100%" rows="6" style="font-size: 15px;"></textarea><Br>
            <button class="btn-success" id="gui">Gửi liên hệ</button><Br><Br>
        </div>
        <div class="col-md-6 d-none d-md-block" style="padding-left: 50px;"><br><br>
            <div class="row">
                <div class="col-1"><i class="fa fa-map-marker" style="font-size: 40px;"></i></div>
                <div class="col-11"><b>&emsp;Địa chỉ liên hệ</b><Br>&emsp;132 Hàm Nghi, Hồ Chí Minh, Thành phố Hồ Chí Minh 700000</div>
            </div><br><br>
            <div class="row">
                <div class="col-1"><i class="fa fa-phone" style="font-size: 40px;"></i></div>
                <div class="col-11"><b>&emsp;Số điện thoại</b><Br>&emsp;<span style="color: orange">0374336080</span><br>
                    &emsp;Thứ 2 - Chủ nhật: 8:00 - 22:00</div>
            </div><br><br>
            <div class="row">
                <div class="col-1"><i class="fa fa-envelope" style="font-size: 40px;"></i></div>
                <div class="col-11"><b>&emsp;Email</b><Br><span style="color: orange">&emsp;hello@rivercrane.vn</span></div>
            </div><br><br>
        </div>
        <div class="col-12 d-block d-md-none">
            <div class="row">
                <div class="col-1"><i class="fa fa-map-marker" style="font-size: 40px;"></i></div>
                <div class="col-11"><b>&emsp;Địa chỉ liên hệ</b><Br>&emsp;132 Hàm Nghi, Hồ Chí Minh, Thành phố Hồ Chí Minh 700000</div>
            </div><br>
            <div class="row">
                <div class="col-1"><i class="fa fa-phone" style="font-size: 40px;"></i></div>
                <div class="col-11"><b>&emsp;Số điện thoại</b><Br>&emsp;<span style="color: orange">0374336080</span><br>
                    &emsp;Thứ 2 - Chủ nhật: 8:00 - 22:00</div>
            </div><br>
            <div class="row">
                <div class="col-1"><i class="fa fa-envelope" style="font-size: 40px;"></i></div>
                <div class="col-11"><b>&emsp;Email</b><Br><span style="color: orange">&emsp;hello@rivercrane.vn</span></div>
            </div>
            <hr style="color: lightblue">
        </div>
    </div>
    <div class="row d-block d-md-none">
        &emsp;Bản đồ<br><br>
        <div class="col-12">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d244.97005248851784!2d106.70030984366666!3d10.771363464959869!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f40989fd83d%3A0x9eba98ec8ea81ce!2zSGF2YW5hIFRvd2VyLCAxMzIgSMOgbSBOZ2hpLCBQaMaw4budbmcgQuG6v24gVGjDoG5oLCBRdeG6rW4gMSwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaWV0bmFt!5e0!3m2!1sen!2s!4v1632108712727!5m2!1sen!2s" width="100%" height="300" style="border: 1px solid lightblue;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
    <div class="row d-none d-md-block">
        <div class="col-12">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d244.97005248851784!2d106.70030984366666!3d10.771363464959869!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f40989fd83d%3A0x9eba98ec8ea81ce!2zSGF2YW5hIFRvd2VyLCAxMzIgSMOgbSBOZ2hpLCBQaMaw4budbmcgQuG6v24gVGjDoG5oLCBRdeG6rW4gMSwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaWV0bmFt!5e0!3m2!1sen!2s!4v1632108712727!5m2!1sen!2s" width="100%" height="450" style="border: 1px solid lightblue;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#gui").click(function(){
                let ho_ten = $("#ho_ten").val();
                let email = $("#email").val();
                let sdt = $("#sdt").val();
                let dia_chi = $("#dia_chi").val();
                let noi_dung = $("#noi_dung").val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('send_contact') }}",
                    type:"POST",
                    data:{
                        ho_ten : ho_ten,
                        email : email,
                        sdt : sdt,
                        dia_chi : dia_chi,
                        noi_dung : noi_dung
                    },
                    success: function(response){
                        if(response.messenge){
                            let abc = '';
                            if(response.messenge.ho_ten){
                                abc = response.messenge.ho_ten[0] + "<br>";
                            }
                            else if(response.messenge.email){
                                abc = response.messenge.email[0] + "<br>";
                            }
                            else if(response.messenge.dia_chi){
                                abc = response.messenge.dia_chi[0] + "<br>";
                            }
                            else if(response.messenge.sdt){
                                abc = response.messenge.sdt[0] + "<br>";
                            }
                            else if(response.messenge.noi_dung){
                                abc = response.messenge.noi_dung[0] + "<br>";
                            }
                            alertify.success(abc);
                        }
                        else{
                            alertify.success('Đã gửi yêu cầu thành công!');
                            $("#ho_ten").val('');
                            $("#sdt").val('');
                            $("#dia_chi").val('');
                            $("#email").val('');
                            $("#noi_dung").val('');
                        }
                    }
                });
            });
        });
    </script>
@endsection
