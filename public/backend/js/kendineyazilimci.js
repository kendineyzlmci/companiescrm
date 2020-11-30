var app = {

  back: function(){
    window.history.back();
  },

  refresh: function (time = 0) {

    if (time == "") {
      var time = 0;
    }

    time = time * 1000;

    setTimeout(function () {
      location.reload(true);
    }, time);

  },

  redirect: function (url, time) {

    if (time == "") {
      var time = 0;
    }

    time = time * 1000;

    setTimeout(function () {
      window.location = url;
    }, time);
  },

};