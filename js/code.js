
// doctor script: 

$(document).ready(function() {

    $('#search').keyup(function() {
      search_table($(this).val());

    });

    function search_table(value) {
      $('#rows tr').each(function() {
        var found = 'false';
        $(this).each(function() {
          if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
            found = 'true';
          }
        });
        if (found == 'true') {
          $(this).show();
        } else {
          $(this).hide();
        }
      });

    }

    $('.delete-btn').click(function(e) {
      e.preventDefault();

      var sid = $(this).closest('tr').find('.doctorid').text();
      $('#delete_id').val(sid);
      $('#delete').modal('show');

    });


    $('.view-btn').click(function(e) {
      e.preventDefault();
      var doctorid = $(this).closest('tr').find('.doctorid').text();
      // console.log(userid);
      $.ajax({
        type: "POST",
        url: "code.php",
        data: {
          'checking_doctorbtn': true,
          'doctor_id': doctorid,
        },
        success: function(response) {
          //  console.log(response);
          $('.user_viewing').html(response);
          $('#view').modal('show');

        }
      });

    });

    // edit value
    $(document).on('click', 'a[data-role=doctorupdate]', function() {
      // append values in input feilds
      // alert($(this).attr('data-id'));
      var did = $(this).attr('data-id');
      var doctor_name = $('#' + did).children('td[data-target=doctor_name]').text();
      var email = $('#' + did).children('td[data-target=email]').text();
      var mobile = $('#' + did).children('td[data-target=mobile]').text();
      var specialization = $('#' + did).children('td[data-target=specialization]').text();

      $('#doctor_id').val(did);
      $('#editdoctorname').val(doctor_name);
      $('#editemail').val(email);
      $('#editmobile').val(mobile);
      $('#editspecialization').val(specialization);
      $('#edit').modal('toggle');

    });

  });


//   patient script:

  $(document).ready(function() {

    $('#search').keyup(function() {
      search_table($(this).val());

    });

    function search_table(value) {
      $('#mytable tr').each(function() {
        var found = 'false';
        $(this).each(function() {
          if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
            found = 'true';
          }
        });
        if (found == 'true') {
          $(this).show();
        } else {
          $(this).hide();
        }
      });

    }

    $('.delete-btn').click(function(e) {
      e.preventDefault();

      var sid = $(this).closest('tr').find('.patient_id').text();
      $('#delete_id').val(sid);
      $('#delete').modal('show');

    });

    $('.view-btn').click(function(e) {
      e.preventDefault();
      var patientid = $(this).closest('tr').find('.patient_id').text();
      // console.log(userid);
      $.ajax({
        type: "POST",
        url: "code.php",
        data: {
          'checking_patientbtn': true,
          'patient_id': patientid,
        },
        success: function(response) {
          //  console.log(response);
          $('.user_viewing').html(response);
          $('#view').modal('show');

        }
      });
    });

    // edit value
    $(document).on('click', 'a[data-role=patientupdate]', function() {
      // append values in input feilds
      // alert($(this).attr('data-id'));
      var id = $(this).attr('data-id');
      var patient_name = $('#' + id).children('td[data-target=patient_name]').text();
      var email = $('#' + id).children('td[data-target=email]').text();
      var mobile = $('#' + id).children('td[data-target=mobile]').text();
      var age = $('#' + id).children('td[data-target=age]').text();
      var doctor_name = $('#' + id).children('td[data-target=doctor_name]').text();



      $('#patient_id').val(id);
      $('#editpatientname').val(patient_name);
      $('#editemail').val(email);
      $('#editmobile').val(mobile);
      $('#editage').val(age);
      $('#editdoctorname').val(doctor_name);

      $('#edit').modal('toggle');


    });
  });

//   appointment script:

  $(document).ready(function() {

    $('#search').keyup(function() {
      search_table($(this).val());

    });

    function search_table(value) {
      $('#mytable tr').each(function() {
        var found = 'false';
        $(this).each(function() {
          if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
            found = 'true';
          }
        });
        if (found == 'true') {
          $(this).show();
        } else {
          $(this).hide();
        }
      });
    }

    $('.delete-btn').click(function(e) {
      e.preventDefault();

      var sid = $(this).closest('tr').find('.app_id').text();
      $('#delete_id').val(sid);
      $('#delete').modal('show');

    });

    $('.view-btn').click(function(e) {
      e.preventDefault();
      var appid = $(this).closest('tr').find('.app_id').text();
      // console.log(userid);
      $.ajax({
        type: "POST",
        url: "code.php",
        data: {
          'checking_appbtn': true,
          'app_id': appid,
        },
        success: function(response) {
          //  console.log(response);
          $('.user_viewing').html(response);
          $('#view').modal('show');

        }
      });
    });

    // edit value
    $(document).on('click', 'a[data-role=appointmentupdate]', function() {
      // append values in input feilds

      var id = $(this).attr('data-id');
      var app_number = $('#' + id).children('td[data-target=app_number]').text();
      var patient_id = $('#' + id).children('td[data-target=patient_name]').text();
      var doctor_id = $('#' + id).children('td[data-target=doctor_name]').text();
      var specialization_id = $('#' + id).children('td[data-target=specialization]').text();
      var fees = $('#' + id).children('td[data-target=fees]').text();
      var app_date = $('#' + id).children('td[data-target=app_date]').text();
      var app_time = $('#' + id).children('td[data-target=app_time]').text();

      // alert(app_number);

      $('#app_id').val(id);
      $('#editapp_number').val(app_number);
      $('#editpatientname').val(patient_id);
      $('#editdoctorname').val(doctor_id);
      $('#editspecialization').val(specialization_id);
      $('#editfees').val(fees);
      $('#editapp_date').val(app_date);
      $('#editapp_time').val(app_time);
      $('#edit').modal('toggle');

    });

  });

//   specialization script:

$(document).ready(function() {

    $('#search').keyup(function() {
      search_table($(this).val());

    });

    function search_table(value) {
      $('#mytable tr').each(function() {
        var found = 'false';
        $(this).each(function() {
          if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
            found = 'true';
          }
        });
        if (found == 'true') {
          $(this).show();
        } else {
          $(this).hide();
        }
      });

    }

    $('.delete-btn').click(function(e) {
      e.preventDefault();

      var sid = $(this).closest('tr').find('.s_id').text();
      $('#delete_id').val(sid);
      $('#delete').modal('show');

    });

    $('.view-btn').click(function(e) {
      e.preventDefault();
      var sid = $(this).closest('tr').find('.s_id').text();
      // console.log(userid);
      $.ajax({
        type: "POST",
        url: "code.php",
        data: {
          'checking_specializationbtn': true,
          's_id': sid,
        },
        success: function(response) {
          //  console.log(response);
          $('.user_viewing').html(response);
          $('#view').modal('show');

        }
      });

    });

    // edit value
    $(document).on('click', 'a[data-role=specializationupdate]', function() {
      // append values in input feilds

      var id = $(this).attr('data-id');
      var specialization = $('#' + id).children('td[data-target=specialization]').text();
      // alert(id);

      $('#s_id').val(id);
      $('#editspecialization').val(specialization);
      $('#edit').modal('toggle');

    });

  });

//   user script

$(document).ready(function() {

    $('#search').keyup(function() {
      search_table($(this).val());

    });

    function search_table(value) {
      $('#mytable tr').each(function() {
        var found = 'false';
        $(this).each(function() {
          if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
            found = 'true';
          }
        });
        if (found == 'true') {
          $(this).show();
        } else {
          $(this).hide();
        }
      });

    }

    $('.delete-btn').click(function(e) {
      e.preventDefault();

      var sid = $(this).closest('tr').find('.id').text();
      $('#delete_id').val(sid);
      $('#delete').modal('show');

    });


    $('.view-btn').click(function(e) {
      e.preventDefault();
      var id = $(this).closest('tr').find('.id').text();
      // console.log(userid);
      $.ajax({
        type: "POST",
        url: "code.php",
        data: {
          'checking_userbtn': true,
          'id': id,
        },
        success: function(response) {
          //  console.log(response);
          $('.user_viewing').html(response);
          $('#view').modal('show');

        }
      });
    });

    // edit value
    $(document).on('click', 'a[data-role=update]', function() {
      // append values in input feilds
      var id = $(this).attr('data-id');
      var firstName = $('#' + id).children('td[data-target=firstName]').text();
      var lastName = $('#' + id).children('td[data-target=lastName]').text();
      var email = $('#' + id).children('td[data-target=Email]').text();

      $('#userId').val(id);
      $('#editfname').val(firstName);
      $('#editlname').val(lastName);
      $('#editemail').val(email);
      $('#edit').modal('toggle');
      // alert($(this).data('id'));

    });

  });

