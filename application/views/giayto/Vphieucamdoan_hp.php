<!DOCTYPE html>
<html lang="">
    <head>
    <meta http-equiv="Pragma" content="no-cache">
        <meta charset="utf-8">
        <title>IN HÓA ĐƠN</title>
    </head>
    <style type="text/css">
      .title{
        font-size: 23px;
        text-align: center;
        margin: 20px 0;
      }
      .dl{
        text-align: center;

      }
      .gcd{
        text-align: center;
        font-size: 22px; 
      }
      .ttsv{
        margin: 7px 0;
        font-size: 14px;
      }
      .camdoan{
        line-height: 26px;
        font-size: 14px;
      }
      .text-right{
        text-align: right;
      }
     .text-left{
        text-align: left;
      }
       .text-center{
         text-align: center;
      }
      .col-md-6{
        width: 50%;
        float: left;
      }
      .kyten p{
        margin: 0;
      }
      .ngay{
        margin: 0;
      }
       .tt-title{
        margin: -16px;
       }

     /*   .page:before{
            content: url(http://localhost:8080/Tuyensinh/public/images/DV01.png);
            opacity: 0.1;
            position: absolute;
            left: 25%;
        }
            
        @media print {
            *{
                -webkit-print-color-adjust: exact;
            }
             @page:before{
                padding: 1em;
                 content: url(http://localhost:8080/Tuyensinh/public/images/DV01.png);
                opacity: 0.1;
                position: absolute;
                left: 25%;
            }
        }*/
        .margin-top{
            margin-top: 70px !important;
        }
        .ngaysinh{
          margin-left: 156px;
        }
        .cmnd{
          margin-left: 10px;
        }
        .sbd{
          margin-left: 15px;
        }
        .email{
          margin-left: 90px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
   
    <body>
            <page size="A5" class="page">
                <div class="row">
                    <div class="col-md-12 thongtinhp">
                        <h2 class="title">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</h2>
                        <h4 class="dl tt-title">
                            Độc lập – Tự do – Hạnh phúc
                        </h4>
                        <h3 class="gcd">GIẤY CAM ĐOAN</h3>
                        <h4 class="dl">Kính gửi: Hội đồng tuyển sinh Trường Đại học Mở Hà Nội</h4>
                    </div>
                    <div class="col-md-12">
                        <p class="text-left ttsv"><span>Tên tôi là: <b>{$sinhvien_in.hoten}</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span>Mã SV: <b>{$sinhvien_in.masv}</b></span><span class="sbd">SBD: <b>{$sinhvien_in.soBD}</b></span></p>
                       <p class="text-text-left ttsv"><span>Giới tinh: <b>{$sinhvien_in.gioitinh}</b></span> <span class="ngaysinh">Ngày sinh: <b>{$sinhvien_in.ngaysinh}</b></span> <span class="cmnd">CMND: <b>{$sinhvien_in.CMND}</b>&nbsp;&nbsp;&nbsp;</span></p>
                       <p class="text-left ttsv"><span>Điện thoại: <b>{$sinhvien_in.sdt}</b></span> <span class="email"> Email: <b>{$sinhvien_in.email}</b></span></p>
                       <p class="text-left ttsv">Thí sinh Khoa (Ngành):  <span class="nganh"><b>{$danhmuc['nganh'][$sinhvien_in.FK_sMaNganh]}</b></span></p>
                       <p class="ttsv camdoan">
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Khi làm thủ tục nhập học, tôi đã nộp thiếu học phí tạm thu kỳ I năm học {date('Y')} – {date('Y')+1}, số tiền thiếu là:……….………. Tôi cam đoan sẽ hoàn tất việc nộp học phí hạn ngày 10/09/{date('Y')}.
                         Nếu sau ngày 10/09/{date('Y')} mà không hoàn thành việc nộp học phí, tôi xin hoàn toàn chịu trách nhiệm và chấp nhận bị xóa tên khỏi danh sách trúng tuyển vào Trường.

                       </p>
                    </div>
                    <div class="col-md-12 ngay">
                        <p class="text-right"><i>Hà Nội, ngày  {date('d')}   tháng   {date('m')}  năm {date('Y')}</i></p>
                    </div>
                    <div class="col-md-12 kyten">
                        <div class="col-md-6 text-left">
                            <p class="text-center"><b>Người nhận</b> </p>
                            <p class="text-center margin-top"><b>{$danhmuc['canbo'][$session['macb']]}</b> </p>
                        </div>
                        <div class="col-md-6 text-right">
                            <p class="text-center"><b>     Thí sinh</b> </p>
                            <p class="text-center margin-top"><b>     {$sinhvien_in.hoten}</b> </p>
                        </div>
                    </div>
                </div>
            </page>
    </body>
        <script type="text/javascript">
            window.print();
        window.onafterprint = function(){
                location.href= window.location.origin+window.location.pathname+"?sbd="+{$sinhvien_in.soBD};
          }
    </script>
</html>