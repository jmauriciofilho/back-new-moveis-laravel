String.prototype.replaceAll = function(search, replacement) {
    return this.split(search).join(replacement);
};

function convertCharInHtml(char) {
    return '&#'+char.charCodeAt(0)+';';
}

function firstToUpperCase(string) {
    return string.length ? string[0].toUpperCase() + string.substr(1) : string;
}

function setErrorToasts(selectList) {
    selectList.forEach(function(select) {
        var field = select.getAttribute('data-field');
        var optionList = select.children;
        for (var i = 0; i < optionList.length; i++) {
            toast.setTitle(firstToUpperCase(field));
            toast.setMessage(optionList[i].textContent);
            toast.setType('error');
            toast.show();
        }
    });
}

/**
 * Toast
 *
 * @returns {Toast}
 * @constructor
 */
function Toast() {
    if (!(this instanceof Toast)) { return new Toast(); }
    this.type       = 'success';
    this.title      = 'Title';
    this.message    = 'Message';
    toastr.options.progressBar = true;
    toastr.options.positionClass = 'toast-top-right';
}
Toast.prototype.setOptions = function(options) {
    toastr.options = options;
};
Toast.prototype.setType = function(type) {
    this.type = type;
};
Toast.prototype.setMessage = function(message) {
    this.message = message;
};
Toast.prototype.setTitle = function(title) {
    this.title = title;
};
Toast.prototype.show = function() {
    toastr[this.type](this.message, this.title);
};

/**
 * Notify
 *
 * @returns {Notify}
 * @constructor
 */
function Notify() {
    if (!(this instanceof Notify)) { return new Notify(); }
    this.list        = document.getElementById('listNotify');
    this.countList   = document.getElementById('countNotify');
    this.headerList  = document.getElementById('headerListNotify');
    this.count       = 0;
}
Notify.prototype.add = function(param) {

    var data = param ? param : {
        title: 'Support Team',
        message: 'Why not buy a new awesome theme?',
        time: '5 mins',
        src: '/assets/site/img/no-photo.gif',
        href: 'javascript:void(0);'
    };

    var li = document.createElement('li');
    li.innerHTML = '<a href="'+data.href+'" target="_blank"><div class="pull-left"><img src="'+data.src+'" class="img-circle" alt="img"></div><h4>'+data.title+'<small><i class="fa fa-clock-o"></i> '+data.time+'</small></h4><p>'+data.message+'</p></a>';
    this.list.appendChild(li);

    this.count++;
    this.refreshCount();
    if (this.countList.getAttribute('aria-expanded')) {
        this.countList.click();
    }
};
Notify.prototype.clear = function() {
    this.list.innerHTML = '';
    this.count = 0;
    this.refreshCount();
};
Notify.prototype.refreshCount = function() {
    this.countList.innerText = this.getCount();
    this.changeHeader();
};
Notify.prototype.getCount = function() {
    return this.count;
};
Notify.prototype.changeHeader = function() {
    this.headerList.innerText = 'You have ' + this.getCount() + ' message(s).';
};

/**
 * Class for manipulate select2 plugin
 *
 * @param selectorId
 * @param inputName
 * @returns {CskSelect2}
 * @constructor
 */
function CskSelect2(selectorId, inputName) {
    if (!(this instanceof CskSelect2)) { return new CskSelect2(selectorId, inputName); }
    this.selector = $('#' + selectorId);
    this.input = $('input[name=' + inputName + ']');
    return this;
}
CskSelect2.prototype.clearSelect = function() {
    this.selector.find('option').remove();
    return this.refreshSelect();
};
CskSelect2.prototype.appendSelect = function(id, name, selected) {
    selected = selected ? selected : '';
    this.selector.append("<option value='" + id + "' "+selected+">" + name + "</option>");
    return this.refreshSelect();
};
CskSelect2.prototype.refreshSelect = function() {
    this.selector.trigger('change');
    return this;
};
CskSelect2.prototype.refreshInput = function() {
    var _this = this;
    _this.input.val(JSON.stringify(_this.selector.val()));
    return this;
};
CskSelect2.prototype.init = function() {
    var _this = this;
    _this.selector.select2();
    _this.selector.on('change', function(evt) {
        _this.refreshInput();
    });
    _this.refreshInput();
    return _this;
};

/**
 * Upload only one image with or without crop
 *
 * @returns {CskUploadAvatar}
 * @constructor
 */
function CskUploadAvatar(divIdAndInputName, imgDefault, description) {
    if (!(this instanceof CskUploadAvatar)) { return new CskUploadAvatar(divIdAndInputName, imgDefault, description); }
    this.div                     = document.getElementById(divIdAndInputName);
    this.wrapper                 = document.createElement('div');
    this.inputFile               = document.createElement('input');
    this.inputFile.name          = divIdAndInputName;
    this.button                  = document.createElement('button');
    this.imgDefault              = imgDefault;
    this.description             = document.createElement('div');
    this.description.innerHTML   = description ? description : '';
    this.setAttributes();
    this.setListeners();
    return this;
}
CskUploadAvatar.prototype.setListeners = function() {
    var _this = this;
    _this.button.addEventListener('click', function(e) {
        e.preventDefault();
        _this.inputFile.click();
    }, false);
    _this.inputFile.addEventListener('change', function(e) {
        if (e.target.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                _this.wrapper.style.backgroundImage = 'url('+e.target.result+')';
            };
            reader.readAsDataURL(e.target.files[0]);
        } else {
            _this.wrapper.style.backgroundImage = 'url('+_this.imgDefault+')';
        }
    });
    return _this;
};
CskUploadAvatar.prototype.setAttributes = function() {
    var _this = this;
    _this.wrapper.style.backgroundImage = 'url('+_this.imgDefault+')';
    _this.wrapper.style.marginBottom = '20px';
    _this.inputFile.type = 'file';
    _this.inputFile.style.width = '100%';
    _this.inputFile.style.height = '100%';
    _this.inputFile.style.opacity = '0';
    _this.inputFile.style.cursor = 'pointer';
    _this.inputFile.title = 'Selecione uma imagem';
    //'width:100%;height:100%;opacity:0;cursor:pointer;';
    _this.description.className   = 'alert alert-default bg-info text-info';
    return _this;
};
CskUploadAvatar.prototype.init = function() {
    var _this = this;
    _this.wrapper.appendChild(_this.inputFile);
    _this.div.appendChild(_this.wrapper);
    if (_this.description.innerText.length) {
        _this.div.appendChild(_this.description);
    }
    return _this;
};

/**
 * CSK Dual List Box Using DataTables
 *
 * @param divId
 * @param settings
 * @constructor
 */
function CskDualListBox(divId, settings) {
    this.div = $('#' + divId);
    this.inputName = null;
    this.anotherDualListBox = null;
    var _this = this;
    this.settings = settings ? settings : {
        language: { url: '/assets/admin/js/dataTables.pt-BR.json' },
        dom: 'ftipr',
        createdRow: function(row, data) {
            row.style.cursor = 'pointer';
            $(row).click(function(e) {
                e.preventDefault();
                _this.anotherDualListBox.add(data[1]);
                _this.div.DataTable().row(row).remove().draw();
            });
        }
    };
}
CskDualListBox.prototype.add = function(data) {
    var _this = this;
    // var disabled = tableOneList.indexOf(_this.div.attr('id')) > -1 ? 'disabled="disabled"' : '';
    var disabled = '';
    var text = data.name + ' ' + convertCharInHtml('<') + data.email + convertCharInHtml('>') + ' <input type="text" name="'+_this.inputName+'" value="'+data.id+'" style="display:none;" '+disabled+' />';
    _this.div.DataTable().row.add([text, data]).draw();
    return _this;
};
CskDualListBox.prototype.removeRows = function() {
    var _this = this;
    _this.div.DataTable().rows().remove().draw();
    return _this;
};
CskDualListBox.prototype.init = function(inputName, anotherDualListBox) {
    var _this = this;
    _this.inputName = inputName;
    _this.anotherDualListBox = anotherDualListBox;
    _this.div.DataTable(_this.settings);
    return _this;
};

dropzoneTransfers =
{
    files: [],
    nameInputFiles: 'files',
    dropzoneId: '#dropzoneTransfers',
    dropzoneUrl: '/admin/files/upload/transfers/',
    dropzoneMethod: 'post',
    removeFileUrl: '/admin/files/destroy/',
    addFile: function(file)
    {
        this.files.push(file);
        this.refreshInputFiles();
    },
    removeFile: function(id)
    {
        this.files = this.files.filter(function(fileId) { return fileId != id; });
        this.refreshInputFiles();
    },
    refreshInputFiles: function()
    {
        var $this = this;
        $('input[name=' + $this.nameInputFiles + ']').val(JSON.stringify($this.files));
    },
    init: function()
    {
        var $this = this;
        Dropzone.autoDiscover = false;

        $($this.dropzoneId).dropzone({
            url: $this.dropzoneUrl,
            method: $this.dropzoneMethod,
            parallelUploads: true,
            uploadMultiple: true,
            addRemoveLinks: true,
            autoProcessQueue: true,
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content')
            },
            init: function() {
                this.on('success', function(file, response) {
                    if (response.code == 200) {
                        $this.addFile(response.data[0].id);
                    }
                });
                this.on('error', function(file) {
                    $(file.previewElement).remove();
                });
                this.on('removedfile', function(file) {
                    var json = JSON.parse(file.xhr.response);
                    $.ajax({
                        url: $this.removeFileUrl + json.data[0].id,
                        type: 'DELETE',
                        complete: function() {
                            $this.removeFile(json.data[0].id);
                        }
                    });
                });
            }
        });
    }
};