
    tinymce.init({



    selector: '#texteditor',
    language: 'pt_BR',
    language_url : '../assets/plugins/tinymce/langs/pt_BR.js',
    theme: 'modern',

    plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools'
    ],
    toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    toolbar2: 'removeformat nocaps allcaps titlecase removebr print preview media | forecolor backcolor emoticons | fontsizeselect',
    font_formats: 'Arial=arial,helvetica,sans-serif;Courier New=courier new,courier,monospace;Arial Black=arial black,avant garde;Indie Flower=indie flower, cursive;Times New Roman=times new roman,times;',
    fontsize_formats: '8pt 9pt 9.2pt 9.4pt 9.5pt 9.7pt 9.9pt 10pt 10.2pt 10.5pt 10.7pt 10.9pt 11pt 11.2pt 11.5pt 11.7pt 11.9pt 12pt 12.2pt 12.5pt 12.7pt 12.8pt 13pt 13.2pt 13.5pt 14pt 15pt 16pt',
    image_advtab: true,
    file_picker_callback: function(callback, value, meta) {
    if (meta.filetype == 'image') {
      $('#upload').trigger('click');
      $('#upload').on('change', function() {
        var file = this.files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
          callback(e.target.result, {
            alt: ''
          });
        };
        reader.readAsDataURL(file);
      });
    }
    },
    setup: function (editor) {
    editor.on('change', function () {
    editor.save();
    });
    editor.addButton('removebr', {
    text: 'Remove brs',
    tooltip: 'Remove line breaks in the current selection.',
    icon: false,
    image: '',
    onclick: function() {
      seleccion = editor.selection.getContent({format : 'html'});
      seleccion = seleccion.replace(/<br \/>/g, '');
      editor.selection.setContent(seleccion);
    },
  });

function removeTags(string, array){
return array ? string.split("<").filter(function(val){ return f(array, val); }).map(function(val){ return f(array, val); }).join("") : string.split("<").map(function(d){ return d.split(">").pop(); }).join("");
function f(array, value){
return array.map(function(d){ return value.includes(d + ">"); }).indexOf(true) != -1 ? "<" + value : value.split(">")[1];
}
}
// novo plugins
// Register the commands
			editor.addCommand('nocaps', function() {
				String.prototype.lowerCase = function() {
					return this.toLowerCase();
				}
            var sel = editor.dom.decode(editor.selection.getContent());
            sel = sel.lowerCase();
            editor.selection.setContent(sel);
            editor.save();
            editor.isNotDirty = true;
        });

			editor.addCommand('allcaps', function() {
					String.prototype.upperCase = function() {
    return this.toUpperCase();
}
            var sel = editor.dom.decode(editor.selection.getContent());
            sel = sel.upperCase();
            editor.selection.setContent(sel);
            editor.save();
            editor.isNotDirty = true;
        });

			editor.addCommand('sentencecase', function() {
					String.prototype.sentenceCase = function() {
    return this.toLowerCase().replace(/(^\s*\w|[\.\!\?]\s*\w)/g, function(c)
	{
		return c.toUpperCase()
	});
}
            var sel = editor.dom.decode(editor.selection.getContent());
            sel = sel.sentenceCase();
            editor.selection.setContent(sel);
            editor.save();
            editor.isNotDirty = true;
        });

			editor.addCommand('titlecase', function() {
					String.prototype.titleCase = function() {
    return this.toLowerCase().replace(/(^|[^a-z])([a-z])/g, function(m, p1, p2)
    {
        return p1 + p2.toUpperCase();
    });
}
            var sel = editor.dom.decode(editor.selection.getContent());
            sel = sel.titleCase();
            editor.selection.setContent(sel);
            editor.save();
            editor.isNotDirty = true;
        });

			// Register Keyboard Shortcuts
			editor.addShortcut('meta+shift+l','Lowercase', ['nocaps', false, 'Lowercase'], this);
			editor.addShortcut('meta+shift+u','Uppercase', ['allcaps', false, 'Uppercase'], this);
			editor.addShortcut('meta+shift+s','Sentence Case', ['sentencecase', false, 'Sentence Case'], this);
			editor.addShortcut('meta+shift+t','Title Case', ['titlecase', false, 'Lowercase'], this);

			// Register the buttons
            editor.addButton('nocaps', {
                title : 'Lowercase (Ctrl+Shift+L)',
								text: 'Minusculo',
				cmd : 'nocaps',
            });
            editor.addButton('allcaps', {
                title : 'Uppercase (Ctrl+Shift+U)',
								text: 'Maiusculo',
				cmd : 'allcaps',
            });
            editor.addButton('sentencecase', {
                title : 'Sentence Case (Ctrl+Shift+S)',
								text: 'Sentença',
				cmd : 'sentencecase',
            });
			editor.addButton('titlecase', {
                title : 'Title Case (Ctrl+Shift+T)',
								text: 'Aa',
				cmd : 'titlecase',
            });

//

editor.addButton('mybutton', {
                type: 'menubutton',
                text: 'Aa',
                icon: false,
                menu: [
                    {text: 'MAIÚSCULAS ', onclick: function () {
            seleccion = editor.selection.getContent({format : 'html'});
            seleccion = seleccion.replace(/<span \/>/g, '');

            var recebe_selecao =  "<span style='text-transform:uppercase !important'>" +removeTags(seleccion) + "</span>";
            editor.insertContent(recebe_selecao);
                                                                }

                   },

                    {text: 'mínusculo', onclick: function() {
                      seleccion = editor.selection.getContent({format : 'textContent'});
                    //  seleccion = seleccion.replace(/<span \/>/g, '');



                      var recebe_selecao =  "<span style='text-transform:lowercase !important'>" +removeTags(seleccion) + "</span>";
                      editor.insertContent(recebe_selecao);

                      console.log(editor.getBody());
                                                            }
                   },

                    {text: 'Alternado', onclick: function() {
                      seleccion = editor.selection.getContent({format : 'textContent'});
                      seleccion = seleccion.replace(/<span \/>/g, '');

                      var recebe_selecao =  "<span style='text-transform:capitalize !important'>" +removeTags(seleccion) + "</span>";
                      editor.insertContent(recebe_selecao);

                                                            }
                   },
                    {text: 'CUSTOM', onclick: function() {editor.insertContent('<b>teste</b>');}}

                ]
            });


}

}

);


function setB() {
  document.execCommand('bold', false, null);
}

function setI() {
  document.execCommand('italic', false, null);
}

function setU() {
  document.execCommand('underline', false, null);
}

function setsC(e) {
  tags('span', 'sC');
}

function tags(tag, klass) {
  var ele = document.createElement(tag);
  ele.classList.add(klass);
  wrap(ele);
}

function wrap(tags) {
  var select = window.getSelection();
  if (select.rangeCount) {
    var range = select.getRangeAt(0).cloneRange();
    range.surroundContents(tags);
    select.removeAllRanges();
    select.addRange(range);
  }
}
