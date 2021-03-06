<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="page-title-box">
            <h4 class="page-title">Permintaan Item</h4>
            <div class="clearfix"></div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="card-box table-responsive">
          <h4 class="m-t-0 header-title"><b>Daftar Permintaan</b></h4>
          <table id="datatable" class="table table-striped table-colored table-info">
            <thead>
              <tr>
                  <th style="width: 200px; text-transform: none;text-align: center;">Futsal</th>

                  <th style="width: 100px; text-transform: none;text-align: center;">Id Futsal</th>

                  <th style="width: 10px; text-transform: none;text-align: center;">Kota</th>

                  <th style="width: 10px; text-transform: none;text-align: center;">Tanggal Pengajuan</th>

                  <th style="width: 10px; text-transform: none;text-align: center;">Nominal</th>

                  <th style="width: 10px; text-transform: none;text-align: center;">Kuantitas</th>

                  <th style="width: 10px; text-transform: none;text-align: center;">Pembayaran</th>

                  <th style="width: 100px; text-transform: none;text-align: center;">Opsi</th>
              </tr>
            </thead>

            <tbody id="list_">
              <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>
          </tbody>
          </table>
        </div>
    </div>
  </div>
</div>

<script>
  var content   = "";

  var initApps  = function()
  {
    getDistOrder();
  };

  function getDistOrder()
  {
    $.ajax
    ({
      type        : "POST",
      url         : "http://www.maufutsal.com/api_mf/development.php",
      dataType    : "JSON",
      data        : "type=reqgetdistorder",
      contentType : "application/x-www-form-urlencoded; charset=UTF-8",
      cache       : false,
      success     : function(JSONObject)
      {
        for(var key in JSONObject)
        {
          if(JSONObject.hasOwnProperty(key))
          {
            if(JSONObject[key]["type"]==="resgetdistorder")
            {
              var futsal_name   = JSONObject[key]["futsal_name"];
              var id_user       = JSONObject[key]["id_user"];
              var id_reg        = JSONObject[key]["id_reg"];
              var date          = JSONObject[key]["date"];
              var nominal       = JSONObject[key]["nominal"];
              var quantity      = JSONObject[key]["quantity"];
              var payment_stat  = JSONObject[key]["payment_state"];
              var condition     = JSONObject[key]["condition"];
              var city          = JSONObject[key]["city"];

              content += "<tr>";
              content += "<td  style=\"text-align: center;\">"+futsal_name+"</td>";
              content += "<td style=\"text-align: center;\">"+id_reg+"</td>";
              content += "<td style=\"text-align: center;\">"+city+"</td>";
              content += "<td style=\"text-align: center;\">"+date+"</td>";
              content += "<td style=\"text-align: center;\">"+"IDR "+nominal+"</td>";
              content += "<td style=\"text-align: center;\">"+quantity+"</td>";
              content += "<td style=\"text-align: center;\"><span class=\"label label-danger\">"+payment_stat+"</span></td>";
              content += "<td style=\"text-align: center;\"><button class=\"btn btn-icon waves-effect waves-light btn-default\"> <i class=\"fa fa-eye\"></i></button>&nbsp;&nbsp;&nbsp;";
              content += "<button class=\"btn btn-icon waves-effect waves-light btn-success\"><i class=\"fa fa-check\"></i> </button></td>";
              content += "</tr>"
              $("#list_").append(content);
            }
          }
        }
      }
    });
    return false;
  }

  $(document).ready(initApps);
</script>
