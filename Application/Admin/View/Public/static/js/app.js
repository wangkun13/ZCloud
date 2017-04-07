var
  BROWSER = {
    versions: function() {
      var u = navigator.userAgent,
        app = navigator.appVersion;
      return {
        weibo: u.indexOf('weibo') > -1,
        qq: u.indexOf('QQ/') > -1,
        qqBrowser: u.indexOf('MQQBrowser') > -1,
        weChat: u.indexOf('MicroMessenger') > -1,
        trident: u.indexOf('Trident') > -1,
        presto: u.indexOf('Presto') > -1,
        webKit: u.indexOf('AppleWebKit') > -1,
        gecko: u.indexOf('Gecko') > -1 && u.indexOf('KHTML') == -1,
        mobile: !!u.match(/AppleWebKit.*Mobile.*/) || !!u.match(/Windows Phone/) || !!u.match(/Android/) || !!u.match(/MQQBrowser/),
        ios: !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/),
        android: u.indexOf('Android') > -1 || u.indexOf('Linux') > -1,
        iPhone: u.indexOf('iPhone') > -1 || u.indexOf('Mac') > -1,
        iPad: u.indexOf('iPad') > -1,
        webApp: u.indexOf('Safari') == -1
      };
    }(),
    language: (navigator.browserLanguage || navigator.language).toLowerCase()
  },
  TRIM = function(str) {
    return !!str ? str.replace(/(^\s*)|(\s*$)/g, '') : '';
  },
  /* Get params from location.search */
  URL_PARAM = function(name) {
    var _reg = new RegExp('(^|&)' + name + '=([^&]*)(&|$)'),
      _r = window.location.search.substr(1).match(_reg);
    return !!_r ? decodeURIComponent(_r[2]) : '';
  },
  /* Math the length of string */
  STRING_LENGTH = function(str) {
    var _realLength = 0,
      _len = str.length,
      _charCode = -1;
    for (var __i = 0; __i < _len; __i++) {
      _charCode = str.charCodeAt(__i);
      (_charCode >= 0 && _charCode <= 128) ? (_realLength += 1) : (_realLength += 2);
    }
    return _realLength;
  },
  /* Merge two array and return a new */
  ARRAY_MERGE = function(_to, _from) {
    var
      _to = (typeof array1 == 'object') ? _to : [],
      _from = (typeof array1 == 'object') ? _from : [];

    _from.forEach(function(obj) {
      if (_to.indexOf(obj) < 0)
        _to.push(obj);
    });
    return _to;
  },
  SEARCH_INAPP = URL_PARAM('isshare') == '1',
  SEARCH_ID = URL_PARAM('id'),
  SEARCH_LAT = URL_PARAM('lat'),
  SEARCH_LON = URL_PARAM('lon'),
  /* Fn for the notice cnr */
  BASE = new Vue({
    el: '#noticeCnr',
    data: {
      consoleMsg: '',
      alert: {
        msg: '',
        type: '',
        show: !1
      },
      confirm: {
        msg: '',
        confirm: function() {},
        cancel: function() {},
        show: !1
      }
    },
    methods: {
      showAlert: function(msg, type, auto) {
        switch (type) {
          case 'success':
            type = 'alert-success';
            break;
          case 'warning':
            type = 'alert-warning';
            break;
          case 'danger':
            type = 'alert-danger';
            break;
          default:
            type = '';
        }
        this.alert = {
          msg: msg,
          type: type,
          show: !0
        };
        setTimeout(function() {
          BASE.hideAlert();
        }, 3000);
      },
      hideAlert: function() {
        this.alert = {
          msg: '',
          type: '',
          show: !1
        };
      },
      initTextCount: function() {
        setTimeout(function() {
          $('.laia-ctrl').keyup();
        }, 300);
      },
      showConfirm: function(msg, confirm, cancel) {
        this.confirm = {
          msg: msg,
          confirm: (typeof confirm == 'function') ? (function() {
            BASE.hideConfirm();
            confirm();
          }) : (function() {
            BASE.hideConfirm();
          }),
          cancel: (typeof cancel == 'function') ? (function() {
            BASE.hideConfirm();
            cancel();
          }) : (function() {
            BASE.hideConfirm();
          }),
          show: !0
        };
      },
      hideConfirm: function() {
        this.confirm = {
          msg: '',
          confirm: function() {},
          cancel: function() {},
          show: !1
        };
      },
      console: function(msg) {
        this.consoleMsg = msg;
      },
      bgImg: function(url) {
        return url ? ('url(' + url + ')') : '';
      }
    }
  });
/*对Date的扩展，将 Date 转化为指定格式的String
 月(M)、日(d)、小时(h)、分(m)、秒(s)、季度(q) 可以用 1-2 个占位符，
 年(y)可以用 1-4 个占位符，毫秒(S)只能用 1 个占位符(是 1-3 位的数字)
 例子：
 (new Date()).Format('yyyy-MM-dd hh:mm:ss.S') ==> 2006-07-02 08:09:04.423
 (new Date()).Format('yyyy-M-d h:m:s.S')      ==> 2006-7-2 8:9:4.18 */
Date.prototype.Format = function(fmt) {
  var o = {
    'M+': this.getMonth() + 1, //月份   
    'd+': this.getDate(), //日   
    'h+': this.getHours(), //小时   
    'm+': this.getMinutes(), //分   
    's+': this.getSeconds(), //秒   
    'q+': Math.floor((this.getMonth() + 3) / 3), //季度   
    'S': this.getMilliseconds() //毫秒   
  };
  if (/(y+)/.test(fmt))
    fmt = fmt.replace(RegExp.$1, (this.getFullYear() + '').substr(4 - RegExp.$1.length));
  for (var k in o) {
    if (new RegExp('(' + k + ')').test(fmt))
      fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (('00' + o[k]).substr(('' + o[k]).length)));
  }
  return fmt;
};
/*扩展Array 根据元素删除 根据index删除 排序前移 排序后移*/
Array.prototype.remove = function(string) {
  this.splice(this.indexOf(string), 1);
};
Array.prototype.removeByIndex = function(idx) {
  this.splice(idx, 1);
};
Array.prototype.up = function(idx) {
  if (idx < 1)
    return !1;
  var _obj = this[idx];
  this.splice(idx, 1);
  this.splice(idx - 1, 0, _obj);
};
Array.prototype.down = function(idx) {
  if (idx + 1 > this.length)
    return !1;
  var _obj = this[idx];
  this.splice(idx, 1);
  this.splice(idx + 1, 0, _obj);
};
jQuery(document).ready(function() {
  var myNav = $('.side-nav a');
  for (var i = 0; i < myNav.length; i++) {
    var links = myNav.eq(i).attr('href');
    var myURL = document.URL;
    var durl = /http:\/\/([^\/]+)\//i;
    domain = myURL.match(durl);
    var result = myURL.replace('http://' + domain[1], '');
    if (links == result) {
      myNav.eq(i).parents('.dropdown').addClass('open');
      myNav.eq(i).parents('.nav-lvl-3').addClass('open');
    }
  }
  $('.laia-ipt').each(function() {
    $(this).addClass('laia-ctrl');
    /*$(this).replaceWith(
     '<div class="laia-ctrl-cnr">' +
     '<input class="laia-ctrl laia-ipt" type="text" v-model="'+this['v-model']+'" placeholder="' + this.placeholder + '" maxlength=' + this.maxLength + '>' +
     '<div class="laia-ctrl-count"><span class="help-ntc">0</span><span>/</span><span>' + this.maxLength + '</span></div>' +
     '</div>'
     );*/
  });
  $('.laia-area').each(function() {
    $(this).addClass('laia-ctrl');
    /*$(this).replaceWith(
     '<div class="laia-ctrl-cnr">' +
     '<textarea class="laia-ctrl laia-area" rows="' + this.rows + '" placeholder="' + this.placeholder + '" maxlength=' + this.maxLength + '></textarea>' +
     '<div class="laia-ctrl-count"><span class="help-ntc">0</span><span>/</span><span>' + this.maxLength + '</span></div>' +
     '</div>'
     );*/
  });
  $('body').on('keyup', '.laia-ctrl', function() {
    var _len = this.value.length; //STRING_LENGTH(this.value);
    if (_len > parseInt(this.maxLength)) {
      return !1;
    }
    $(this).parent().find('.help-ntc').text(_len);
  });
});