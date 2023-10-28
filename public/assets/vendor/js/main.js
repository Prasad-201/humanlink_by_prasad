/**
* Template Name: NiceAdmin - v2.4.1
* Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/
var jobDescFileSize, jobDescFileExt;
(function () {
  "use strict";

  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }

  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    if (all) {
      select(el, all).forEach(e => e.addEventListener(type, listener))
    } else {
      select(el, all).addEventListener(type, listener)
    }
  }

  /**
   * Easy on scroll event listener 
   */
  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }

  /**
   * Sidebar toggle
   */
  if (select('.toggle-sidebar-btn')) {
    on('click', '.toggle-sidebar-btn', function (e) {
      select('body').classList.toggle('toggle-sidebar')
    })
  }

  /**
   * Search bar toggle
   */
  if (select('.search-bar-toggle')) {
    on('click', '.search-bar-toggle', function (e) {
      select('.search-bar').classList.toggle('search-bar-show')
    })
  }

  /**
   * Navbar links active state on scroll
   */
  let navbarlinks = select('#navbar .scrollto', true)
  const navbarlinksActive = () => {
    let position = window.scrollY + 200
    navbarlinks.forEach(navbarlink => {
      if (!navbarlink.hash) return
      let section = select(navbarlink.hash)
      if (!section) return
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        navbarlink.classList.add('active')
      } else {
        navbarlink.classList.remove('active')
      }
    })
  }
  window.addEventListener('load', navbarlinksActive)
  onscroll(document, navbarlinksActive)

  /**
   * Toggle .header-scrolled class to #header when page is scrolled
   */
  let selectHeader = select('#header')
  if (selectHeader) {
    const headerScrolled = () => {
      if (window.scrollY > 100) {
        selectHeader.classList.add('header-scrolled')
      } else {
        selectHeader.classList.remove('header-scrolled')
      }
    }
    window.addEventListener('load', headerScrolled)
    onscroll(document, headerScrolled)
  }

  /**
   * Back to top button
   */
  let backtotop = select('.back-to-top')
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.classList.add('active')
      } else {
        backtotop.classList.remove('active')
      }
    }
    window.addEventListener('load', toggleBacktotop)
    onscroll(document, toggleBacktotop)
  }

  /**
   * Initiate tooltips
   */
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })

  /**
   * Initiate quill editors
   */
  if (select('.quill-editor-default')) {
    new Quill('.quill-editor-default', {
      theme: 'snow'
    });
  }

  if (select('.quill-editor-bubble')) {
    new Quill('.quill-editor-bubble', {
      theme: 'bubble'
    });
  }

  if (select('.quill-editor-full')) {
    new Quill(".quill-editor-full", {
      modules: {
        toolbar: [
          [{
            font: []
          }, {
            size: []
          }],
          ["bold", "italic", "underline", "strike"],
          [{
            color: []
          },
          {
            background: []
          }
          ],
          [{
            script: "super"
          },
          {
            script: "sub"
          }
          ],
          [{
            list: "ordered"
          },
          {
            list: "bullet"
          },
          {
            indent: "-1"
          },
          {
            indent: "+1"
          }
          ],
          ["direction", {
            align: []
          }],
          ["link", "image", "video"],
          ["clean"]
        ]
      },
      theme: "snow"
    });
  }

  /**
   * Initiate TinyMCE Editor
   */
  const useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
  const isSmallScreen = window.matchMedia('(max-width: 1023.5px)').matches;

  tinymce.init({
    selector: 'textarea.tinymce-editor',
    plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
    editimage_cors_hosts: ['picsum.photos'],
    menubar: 'file edit view insert format tools table help',
    toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
    toolbar_sticky: true,
    toolbar_sticky_offset: isSmallScreen ? 102 : 108,
    autosave_ask_before_unload: true,
    autosave_interval: '30s',
    autosave_prefix: '{path}{query}-{id}-',
    autosave_restore_when_empty: false,
    autosave_retention: '2m',
    image_advtab: true,
    link_list: [{
      title: 'My page 1',
      value: 'https://www.tiny.cloud'
    },
    {
      title: 'My page 2',
      value: 'http://www.moxiecode.com'
    }
    ],
    image_list: [{
      title: 'My page 1',
      value: 'https://www.tiny.cloud'
    },
    {
      title: 'My page 2',
      value: 'http://www.moxiecode.com'
    }
    ],
    image_class_list: [{
      title: 'None',
      value: ''
    },
    {
      title: 'Some class',
      value: 'class-name'
    }
    ],
    importcss_append: true,
    file_picker_callback: (callback, value, meta) => {
      /* Provide file and text for the link dialog */
      if (meta.filetype === 'file') {
        callback('https://www.google.com/logos/google.jpg', {
          text: 'My text'
        });
      }

      /* Provide image and alt text for the image dialog */
      if (meta.filetype === 'image') {
        callback('https://www.google.com/logos/google.jpg', {
          alt: 'My alt text'
        });
      }

      /* Provide alternative source and posted for the media dialog */
      if (meta.filetype === 'media') {
        callback('movie.mp4', {
          source2: 'alt.ogg',
          poster: 'https://www.google.com/logos/google.jpg'
        });
      }
    },
    templates: [{
      title: 'New Table',
      description: 'creates a new table',
      content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>'
    },
    {
      title: 'Starting my story',
      description: 'A cure for writers block',
      content: 'Once upon a time...'
    },
    {
      title: 'New list with dates',
      description: 'New List with dates',
      content: '<div class="mceTmpl"><span class="cdate">cdate</span><br><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>'
    }
    ],
    template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
    template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
    height: 600,
    image_caption: true,
    quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
    noneditable_class: 'mceNonEditable',
    toolbar_mode: 'sliding',
    contextmenu: 'link image table',
    skin: useDarkMode ? 'oxide-dark' : 'oxide',
    content_css: useDarkMode ? 'dark' : 'default',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
  });

  /**
   * Initiate Bootstrap validation check
   */
  var needsValidation = document.querySelectorAll('.needs-validation')

  Array.prototype.slice.call(needsValidation)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })

  /**
   * Initiate Datatables
   */
  const datatables = select('.datatable', true)
  datatables.forEach(datatable => {
    new simpleDatatables.DataTable(datatable);
  })

  /**
   * Autoresize echart charts
   */
  const mainContainer = select('#main');
  if (mainContainer) {
    setTimeout(() => {
      new ResizeObserver(function () {
        select('.echart', true).forEach(getEchart => {
          echarts.getInstanceByDom(getEchart).resize();
        })
      }).observe(mainContainer);
    }, 200);
  }

})();


$(document).ready(function () {
  $('.talentsStoriesCarousel').slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    arrows: true,
    dots: true,
    speed: 2000,
    infinite: true,
    autoplaySpeed: 2000,
    autoplay: true,
    responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 800,
        settings: {
          slidesToShow: 2,
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
        }
      }
    ]
  });

  $('.what-says-our-client').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    dots: true,
    speed: 2000,
    infinite: true,
    autoplaySpeed: 2000,
    autoplay: true,
  });

  $('.our-talent-section').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    dots: true,
    speed: 2000,
    infinite: true,
    autoplaySpeed: 2000,
    autoplay: true,
  });

  $('.trusted-leading-brand').slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    arrows: true,
    dots: true,
    speed: 2000,
    infinite: true,
    autoplaySpeed: 2000,
    autoplay: true,
    responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
        }
      }
    ]
  });

  $('.clientLogo-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: true,
    dots: true,
    speed: 2000,
    infinite: true,
    autoplaySpeed: 2000,
    autoplay: true,
    responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
        }
      }
    ]
  });

  $('.testimonials-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    dots: true,
    speed: 2000,
    infinite: true,
    autoplaySpeed: 2000,
    autoplay: true,
    responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 800,
        settings: {
          slidesToShow: 1,
        }
      }
    ]
  });

  $('body').on('click', '.password-group .eye-button', function () {
    inputField = $(this).closest('.password-group').find('input.form-control');
    if (inputField.attr('type') == 'password') {
      inputField.attr('type', 'text');
    } else {
      inputField.attr('type', 'password');
    }
  });

  $('body').on('change', '.profilePic input[name="change_profile_pic"]', function () {
    $('form#change-profile-pic').submit();
  });

  $('body').on('click', '.profile-Accordion .accordion .icon-button', function () {
    if ($('.profile-page-accordion').find('.opened')) {
      $(".profile-Accordion").removeClass('opened');
      $(".profile-Accordion .action .icon-button .closed").removeClass('opened');
    }
    $(this).closest(".profile-Accordion").toggleClass('opened');
    $(this).find('.closed').toggleClass('opened');
  });

  $('body').on('change', '.form-check-inline input[name="currently_work"]', function () {
    if ($(this).prop('checked') == true) {
      $('#not-work-with').css('display', 'none');
    } else {
      $('#not-work-with').css('display', 'block');
    }
  });

  $('body').on('click', '.accordionOpen .addBtn button', function () {
    parentElement = $(this).parent();
    count = $(parentElement).closest('#achievementAdd').find('.form-group').length;
    if (count < 4) {
      $(parentElement).before('<div class="col-lg-11 col-xl-11 form-group">' +
        '<div class="row">' +
        '<div class="col-lg-6 col-xl-6">' +
        '<input type="hidden" name="achievementHidden[]" value="1">' +
        '<input name="achievement_note[]" class="form-control-element">' +
        '</div>' +
        '<div class="col-lg-6 col-xl-6">' +
        '<input type="file" name="achievement_file[]" class="form-control">' +
        '</div>' +
        '</div>' +
        '</div>');
    }
  });
});

function checkJDStatus(value) {
  if (value == 0) {
    document.querySelector('#step-id-1').style.display = "none";
    document.querySelector('#step-id-2').style.display = "block";
  } else {
    document.querySelector('#step-id-1').style.display = "block";
    document.querySelector('#step-id-2').style.display = "none";
  }
}

$(".input-wrap .nextBtn").click(function (e) {
  var form = $(".step-form form");
  if ($("input[name='jsavailable']:checked").val() == 'not') {
    form.validate({
      rules: {
        'developer_role': {
          required: true,
        },
        'skills[]': {
          required: true,
        },
      },
      messages: {
        'developer_role': {
          required: "This is required.",
        },
        'skills[]': {
          required: "Please select Skills",
        },
      }
    });
    if (form.valid() === true) {
      $('.form-step-process li.step-one').removeClass('active');
      $('.form-step-process li.step-two').addClass('active');
      $('.step-form .basic-brief').addClass('d-none');
      $('.step-form .tech-brief').removeClass('d-none');
      $('.step-form .input-wrap .nextBtn').addClass('d-none');
      $('.step-form .input-wrap .nextSubmitBtn').removeClass('d-none');
    }
  }

  if ($("input[name='jsavailable']:checked").val() == 'Yes') {
    job_desc_file = $(form).find('input[name="job_desc_file"]').val();
    job_desc = $(form).find('textarea[name="jdManual"]').val();
    devel_role = $(form).find('select[name="developer_role_jd_available"] option:selected').val();
    skills = $(form).find('select[name="skills_jd_available[]"]').val();
    if (job_desc_file != '' || job_desc != '') {
      $('small.major-error').html('');
      if (job_desc_file != '') {
        // Accept only PDF files
        if (jobDescFileExt != 'pdf') {
          $('small.job-desc-file').html('Accept only pdf file !!!');
          return false;
        }
        $('small.job-desc-file').html('');
      }

      if (job_desc != '') {
        if (job_desc.length < 20) {
          $('small.job-desc').html('Enter description !!!');
          return false;
        } else {
          $('small.job-desc').html('');
        }
      }
    } else {
      $('small.major-error').html('Select Atleast one input !!!');
      return false;
    }

    if (devel_role == '') {
      $('small.select-role').html('Select Developer Role !!!');
      return false;
    } else {
      $('small.select-role').html('');
    }

    if (skills == '') {
      $('small.select-skills').html('Select Developer Skills !!!');
      return false;
    } else {
      $('small.select-skills').html('');
    }

    $('.form-step-process li.step-one').removeClass('active');
    $('.form-step-process li.step-two').addClass('active');
    $('.step-form .basic-brief').addClass('d-none');
    $('.step-form .tech-brief').removeClass('d-none');
    $('.step-form .input-wrap .nextBtn').addClass('d-none');
    $('.step-form .input-wrap .nextSubmitBtn').removeClass('d-none');
  }
});

$('input[name="job_desc_file"]').on('change', function () {
  // jobDescFileSize = this.files[0].size;
  jobDescFileExt = $(this).val().split('.').pop().toLowerCase();
});

$(".input-wrap .nextSubmitBtn").click(function () {
  var form = $(".step-form form");
  timeZone = $(form).find('select[name="time_zone"]').val();
  timePeriod = $(form).find('select[name="time_period"]').val();
  experienceYear = $(form).find('input[name="experience_year"]').val();
  onboradingTimePeriod = $(form).find('select[name="onborading_time_period"]').val();
  developerRequred = $(form).find('input[name="developer_count"]').val();

  if (!timeZone) {
    $('small.time-zone').html("This field is required !!!");
    return false;
  } else {
    $('small.time-zone').html("");
  }

  if (!timePeriod) {
    $('small.time-period').html("This field is required !!!");
    return false;
  } else {
    $('small.time-period').html("");
  }

  if (!experienceYear) {
    $('small.experience-required').html("This field is required !!!");
    return false;
  } else {
    if (experienceYear >= 11) {
      $('small.experience-required').html("Please add number of Experience required !!!");
      return false;
    }
    $('small.experience-required').html("");
  }

  if (!onboradingTimePeriod) {
    $('small.onboard-time-period').html("This field is required !!!");
    return false;
  } else {
    $('small.onboard-time-period').html("");
  }

  if (!developerRequred) {
    $('small.developer-required').html("This field is required !!!");
    return false;
  } else {
    if (developerRequred >= 11) {
      $('small.developer-required').html("Please add number of developers !!!");
      return false;
    }
    $('small.developer-required').html("");
  }

  $(form).find('button.submitBtn').click();
});

$('.queLists .queBox-wrap h4').on('click', function () {
  $(this).closest('.queLists').find('.open').removeClass('open');
  $(this).closest('.queBox').toggleClass('open');
});

$('body').on('click', '.view-answer-content .view-btn', function () {
  $(this).closest('.view-answer-content').toggleClass('show');
});