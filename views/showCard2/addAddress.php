<link rel="stylesheet" href="<?= URL ?>public/css/bootstrap.css">
<link rel="stylesheet" href="<?= URL ?>public/css/bootstrap-select.css">
<script src="<?= URL ?>public/js/bootstrap-select.js"></script>
<script src="<?= URL ?>public/js/bootstrap.min.js"></script>
<script src="<?= URL ?>public/js/frotel/city.js"></script>
<script src="<?= URL ?>public/js/frotel/ostan.js"></script>
<style>

    .add_address {
        width: 590px;
        height: 600px;
        background: #FFFFFF;
        position: fixed;
        z-index: 6;
        display: none;
        top: 10px;
        left: 0;
        right: 0;
        margin: auto;
        border-radius: 3px;
        border: 1px solid #eeeeee;
        font-family: yekan;
    }

    .add_address .add_address_header {
        height: 50px;
        background: #eeeeee;
        width: 100%;
    }

    .add_address .add_address_header .close {
        width: 28px;
        height: 28px;
        display: inline-block;
        border-radius: 100%;
        background: #cccccc url(<?= URL ?>public/images/slices.png) no-repeat -134px -123px;
        border: 1px solid #cccccc;
        float: left;
        margin: 9px 10px;
        cursor: pointer;
    }

    .add_address .add_address_header .title {
        font-size: 12.5pt;
        padding: 7px 12px;
        float: right;
    }

    .add_address .row {
        float: right;
        margin: 10px 15px;
    }

    .add_address .row .right {
        width: 200px;
        float: right;
        margin-left: 25px;
    }

    .add_address .row .right span {
        font-size: 10pt;

    }

    .add_address .row .left {
        width: 296px;
        float: right;
    }

    .add_address .row .left input {
        width: 277px;
        height: 28px;
        border: 1px solid #eeeeee;
        border-radius: 3px;
    }

    .add_address .row .left textarea {
        width: 290px;
        height: 100px;
        border: 1px solid #eeeeee;
        border-radius: 3px;
    }

    .btn_blue {
        background: #208de6;
        width: 170px;
        height: 40px;
        display: inline-block;
        margin: 30px 20px;
        color: #FFFFFF;
        text-align: center;
        font-size: 10.5pt;
        line-height: 35px;
        border-radius: 4px;
        box-shadow: 0 2px 3px rgba(0, 0, 0, .1);
        cursor: pointer;
    }

    .btnAddAddress{
        float: left;
        margin-left: 40px;
        cursor: pointer
    }

    .dark {
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, .8);
        position: fixed;
        top: 0;
        z-index: 5;
        display: none;
    }


</style>

<div class="add_address">
    <div class="add_address_header">
        <span class="title">افزودن آدرس جدید</span>
        <span class="close" onclick="closeTab()"></span>
    </div>

    <form action="" method="post" id="addAddress">
        <div class="row">
            <div class="right">
                <span>نام و نام خانوادگی تحویل گیرنده</span>
            </div>
            <div class="left">
                <input type="text" name="fullName">
            </div>
        </div>

        <div class="row">
            <div class="right">
                <span>شماره تماس ضروری(تلفن همراه)</span>
            </div>
            <div class="left">
                <input type="text" name="mobile">
            </div>
        </div>

        <div class="row">
            <div class="right">
                <span>شماره تلفن ثابت تحویل گیرنده</span>
            </div>
            <div class="left">
                <input type="text" name="tel">
            </div>
        </div>

        <div class="row">
            <div class="right">
                <span>استان/شهر تحویل گیرنده</span>
            </div>
            <div class="left">

                <select id="province" name="province" class="selectpicker show-tick col-xs-6 province" data-live-search="true">


                </select>

                <span class="shahr">
                <select id="city" name= "city" class="selectpicker show-tick col-xs-5 city" data-live-search="true">
                    <option value="">انتخاب شهر</option>
                </select>
            </span>

                <script>
                    loadOstan('province');
                    $('#province').change(function(){
                       let i = $(this).find('option:selected').val();
                        ldMenu(i, 'city');
                        $('.selectpicker').selectpicker('refresh');
                    });
                </script>

            </div>
        </div>


        <div class="row">
            <div class="right">
                <span>آدرس پستی</span>
            </div>
            <div class="left">
                <textarea name="postalAddress" id="postalAddress" cols="30" rows="10"></textarea>
            </div>
        </div>

        <div class="row">
            <div class="right">
                <span>کد پستی</span>
            </div>
            <div class="left">
                <input type="text" name="postalCode">
            </div>
        </div>

        <span class="btn_blue btnAddAddress" onclick="submitForm()">ثیت اطلاعات و بازگشت</span>

    </form>
</div>
<div class="dark">

</div>


<script>

    function submitForm(){
        let provinceName = $('#province option:selected').text();
        let cityName = $('#city option:selected').text();
        let url = '<?= URL ?>showCard2/addAddress/' + editAddressId;
        let data = $('#addAddress').serializeArray();
        data.push({'name':'provinceName', 'value':provinceName});
        data.push({'name':'cityName', 'value':cityName});
        $.post(url, data, function(msg){
            $('.content table').remove();
            $.each(msg, function(index, value){
                let tableTag = '<table cellspacing="0" data-addressId = '+ value['id'] +' data-city = '+ value['id'] +' class="table_address"><tr><td rowspan="3" onclick="selectedAddress(this)"><span class="circle"></span><span class="triangle"></span></td><td colspan="3"><span class="receiver">'+ value['fullName'] +'</span></td><td rowspan="3" style="width: 40px; padding: 0; margin: 0"><table cellspacing="0" style="width: 100%; height: 138px; margin: 0;"><tr onclick="editAddress('+ value['id'] +')"><td class="edit"><i></i></td></tr><tr><td class="remove"><i></i></td></tr></table></td></tr><tr style="font-size: 10pt;"><td style="width: 200px; text-align: center;">استان: '+ value['province_name'] +'</td><td rowspan="2" style="padding: 5px 50px 5px 20px; clear: both"><span>'+ value['postalAddress'] +'</span><br><span>کد پستی:'+ value['postalCode'] +'</span></td><td style="width: 200px">شماره تماس اضطراری: '+value['mobile']+'</td></tr><tr style="font-size: 10pt;"><td style="text-align: center;">شهر: '+ value['city_name'] +'</td><td>شماره تلفن ثابت: '+ value['tel'] +'</td></tr></table>';
                $('.content').append(tableTag);
            });



            $('.add_address').fadeOut(100);
            $('.dark').fadeOut(100);
            selectedAddress(tag);
        }, 'json');
    }

    let addAddress = $('.add_address');
    $('.selectpicker').selectpicker();

    function addNewAddress() {
        editAddressId = '';
        $('.dark').fadeIn(100);
        addAddress.fadeIn(100);
        $('#addAddress').trigger('reset');
    }

    function closeTab() {
        addAddress.fadeOut(100);
        $('.dark').fadeOut(100);
    }

    let data = $('myForm').serializeArray();

</script>
