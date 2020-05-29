@extends('site.layouts.app')

@section('content')


<div id="allrecords" class="t-records" data-hook="blocks-collection-content-node" data-tilda-project-id="2490189" data-tilda-page-id="11485800" data-tilda-formskey="75384d1d73b94f218474ecbb9b8e314e">
  <div id="rec193460438" class="r t-rec" style=" " data-animationappear="off" data-record-type="456"><!-- T456 -->
    <div id="nav193460438marker"></div>
    <div id="nav193460438" class="t456 t456__positionstatic " style="background-color: rgba(0,0,0,1); "
         data-bgcolor-hex="#000000" data-bgcolor-rgba="rgba(0,0,0,1)" data-navmarker="nav193460438marker"
         data-appearoffset="" data-bgopacity-two="" data-menushadow="" data-bgopacity="1" data-menu-items-align="right"
         data-menu="yes">
      <div class="t456__maincontainer " style="">
        <div class="t456__leftwrapper" style="">
          <div><a href="https://google.com" style="color:#ffffff;">
              <div class="t456__logo t-title" field="title" style="color:#ffffff;">English.improver</div>
            </a></div>
        </div>
        <div class="t456__rightwrapper t456__menualign_right" style="">
          <ul class="t456__list">
            <li class="t456__list_item"><a class="t-menu__link-item" href="" data-menu-submenu-hook=""
                                           style="color:#ffffff;font-weight:600;" data-menu-item-number="1">Подарок</a>
            </li>
            <li class="t456__list_item"><a class="t-menu__link-item" href="" data-menu-submenu-hook=""
                                           style="color:#ffffff;font-weight:600;" data-menu-item-number="2">О
                марафоне</a></li>
            <li class="t456__list_item"><a class="t-menu__link-item" href="" data-menu-submenu-hook=""
                                           style="color:#ffffff;font-weight:600;" data-menu-item-number="3">О нас</a>
            </li>
            <li class="t456__list_item"><a class="t-menu__link-item" href="" data-menu-submenu-hook=""
                                           style="color:#ffffff;font-weight:600;" data-menu-item-number="4">Оплата</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

  </div>
</div>

<div class="headerPage headerPage_background">
    <div class="headerPage__content">
      <div class="headerPage__unit">
        <h1 class="head head_h1 head_center headerPage_head headerPage_head_h1">Марафон по книге <br> "Willpower doesn't work"</h1>
      </div>
      <div class="headerPage__unit headerPage__unit_description">
        <div class="headerPage__description">
          <p class="phar">
            За 30 дней ты прочтешь книгу (+ узнаешь, как легко и эффективно читать на английском), прокачаешь разговорный английский на online встречах, пополнишь словарный запас, закрепишь пройденное, общаясь в чате, выработаешь новые, полезные привычки.
          </p>
        </div>
      </div>
      <div class="headerPage__unit headerPage__unit_startDate">
        <div class="headerPage__startDate">Старт 15 июня</div>
      </div>
      <div class="headerPage__unit headerPage__unit_buttons">
        <div class="headerPage__buttonGroup buttonGroup buttonGroup_center">
          <a class="button button_theme_orange buttonGroup__unit">Хочу присоединиться</a>
          <a class="button button_theme_white buttonGroup__unit">Хочу подарок</a>
        </div>
      </div>
    </div>
</div>

<div class="" style="margin: 100px 0">
  <form method="POST" action="https://money.yandex.ru/quickpay/confirm.xml" class="js-PayModalForm">
    @csrf
    <input type="hidden" name="receiver" value="4100115296615449">
    <input type="hidden" name="formcomment" value="English improvers: Марафон по книге 'Willpower doesn't work'">
    <input type="hidden" name="short-dest" value="English improvers: Марафон по книге 'Willpower doesn't work'">
    <input type="hidden" name="label" value="order_id">
    <input type="hidden" name="quickpay-form" value="donate">
    <input type="hidden" name="targets" value="Заказ {}">
    <input type="hidden" name="sum" value="-1" data-type="number">
    <input type="hidden" name="comment" value="">
    <input type="hidden" name="need-fio" value="false">
    <input type="hidden" name="need-email" value="false">
    <input type="hidden" name="need-phone" value="false">
    <input type="hidden" name="need-address" value="false">
    <input type="hidden" name="productsId" value="[1,2]">
    <input type="hidden" name="successURL" value="/success-payment">
    <div class="form-group">
      <label class="col-form-label">Имя</label>
      <input type="text" name="name">
    </div>
    <div class="form-group">
      <label class="col-form-label">Email</label>
      <input type="text" name="email" value="test@test.ru">
    </div>
    <div class="form-group">
      <label class="col-form-label"><input type="radio" name="paymentType" value="PC" checked>Яндекс.Деньгами</label>
    </div>
    <div class="form-group">
      <label><input type="radio" name="paymentType" value="AC">Банковской картой</label>
    </div>
    <button id="jsPayFormSubmit" class="btn btn-primary">Оплатить</button>
  </form>
</div>

<div style="margin: 40px 20px; width: 400px">
  <a class="button button_theme_orange js-ModalPayButton" data-productsId="[1]">Базовый</a>
  <br>
  <a class="button button_theme_orange js-ModalPayButton" data-productsId="[2]">Про</a>
</div>


<div id="allrecords" class="t-records" data-hook="blocks-collection-content-node" data-tilda-project-id="2490189" data-tilda-page-id="11485800" data-tilda-formskey="75384d1d73b94f218474ecbb9b8e314e">

  <div style="padding: 100px 0">
    <div class="t473">
      <div class="t-container t-align_center">
        <div class="t-col t-col_10 t-prefix_1">
          <h2 class="head head_h2 head_color_black head_center" style="margin-bottom: 20px">О МАРАФОНЕ</h2>
          <div class="t473__descr t-descr t-descr_xxxl t-margin_auto" field="descr" style="color:#ffffff;">
            <div style="color:#080808;" data-customstyle="yes">За 30 дней ты научишься с легкостью читать на английском, прокачаешь свой разговорный язык, расширишь круг знакомств и, конечно же, узнаешь, как быть более продуктивным и избавиться от вредных привычек с книгой Willpower doesn't work.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div>
    <div class="t194" style="padding-bottom: 100px">
      <div class="t-container">
        <div class="t-col t-col_8 t-prefix_2">
          <div class="t194__text t-text t-text_md" style="" field="text">Бенжамин Харди, доктор организационной психологии, успешный блогер и отец троих приемных детей, предлагает вместо силы воли использовать окружающую среду – ваших друзей, социальные сети, стрессовые обстоятельства, питание и распорядок дня – чтобы достигать поставленных целей. Благодаря этой книге вы научитесь:<br/><br/>• достигать результатов без ежедневного насилия над собой<br/><br/>• менять окружающую среду таким образом, чтобы она помогала вам добиваться поставленных целей<br/><br/>• создавать систему отношений, повышающих вашу уверенность в себе<br/><br/>• без потерь выходить из творческих кризисов, не впадать в «овощное» состояние;<br/><br/>• бороться с зависимостями всех уровней и без проблем побеждать в этой борьбе.<br/></div>
        </div>
        <div class="t-col t-col_2 t-align_left">

          <img src="/img/book_willpower.jpg" class="t194__img t-width t-width_2 t-img"/><br/>
          <div class="t194__sectitle" style="" field="imgtitle" itemprop="name">Willpower doesn't work</div>
          <div class="t194__secdescr" style="" field="imgdescr" itemprop="description">by Benjamin
            Hardy</div>
        </div>
    </div>
  </div>
  <div id="rec193471496" class="r t-rec t-rec_pt_135 t-rec_pb_165"
       style="padding-top:135px;padding-bottom:165px;background-color:#f2f2f2; " data-animationappear="off"
       data-record-type="844" data-bg-color="#f2f2f2"><!-- t844 -->
    <div class="t844">
      <div class="t-section__container t-container">
        <div class="t-col t-col_12">
          <div class="t-section__topwrapper t-align_center">
            <div class="t-section__title t-title t-title_xs" field="btitle">Марафон в цифрах</div>
          </div>
        </div>
      </div>
      <div class="t-container">
        <div class="t844__col t-col t-col_4 t-align_center t-item"><img
            src="https://static.tildacdn.com/lib/tildaicon/63646665-3537-4030-b236-613462616636/Blck_Tilda_Icons_46_ny_calendar.svg"
            class="t844__img t-img" imgfield="li_img__1531137250635" style="width:80px;"/>
          <div class="t844__wrappercenter ">
            <div class="t-heading t-heading_md" style="" field="li_title__1531137250635">31 день</div>
            <div class="t-descr t-descr_sm" style="" field="li_descr__1531137250635">31 день прокачки английского,
              выработки новых и полезных привычек, мотивации и поддержки со стороны участников и организаторов.
            </div>
          </div>
        </div>
        <div class="t844__col t-col t-col_4 t-align_center t-item"><img
            src="https://static.tildacdn.com/lib/tildaicon/30346639-3130-4135-a333-383437306235/Tilda_Icons_39_IT_effective.svg"
            class="t844__img t-img" imgfield="li_img__1531137263951" style="width:80px;"/>
          <div class="t844__wrappercenter ">
            <div class="t-heading t-heading_md" style="" field="li_title__1531137263951">170 страниц</div>
            <div class="t-descr t-descr_sm" style="" field="li_descr__1531137263951">Всего 5 страниц в день - и за месяц
              ты прочтешь книгу на английском.
            </div>
          </div>
        </div>
        <div class="t844__col t-col t-col_4 t-align_center t-item"><img
            src="https://static.tildacdn.com/lib/tildaicon/64666539-3361-4663-b462-623833343337/Tilda_Icons_39_IT_analytics.svg"
            class="t844__img t-img" imgfield="li_img__1531137278040" style="width:80px;"/>
          <div class="t844__wrappercenter ">
            <div class="t-heading t-heading_md" style="" field="li_title__1531137278040">&gt;300 новых слов</div>
            <div class="t-descr t-descr_sm" style="" field="li_descr__1531137278040">К каждой главе книге есть гайд со
              словами, выражениями, интересностями и заданиями для закрепления.
            </div>
          </div>
        </div>
        <div class="t-clear t844__separator" style=""></div>
        <div class="t844__col t-col t-col_4 t-align_center t-item"><img
            src="https://static.tildacdn.com/lib/tildaicon/64653665-3565-4539-a161-333632383438/2web_handsfree.svg"
            class="t844__img t-img" imgfield="li_img__1531137295061" style="width:80px;"/>
          <div class="t844__wrappercenter ">
            <div class="t-heading t-heading_md" style="" field="li_title__1531137295061">7 online встреч</div>
            <div class="t-descr t-descr_sm" style="" field="li_descr__1531137295061">5 разговорные встречи <br/>(встречаемся
              online, обсуждаем прочитанное, общаемся на английском).<br/><br/>2 вебинара <br/>(расскажем, как с
              легкостью читать на английском, поделимся советами, как эффективно учить язык, ответим на все твои
              вопросы).
            </div>
          </div>
        </div>
        <div class="t844__col t-col t-col_4 t-align_center t-item"><img
            src="https://static.tildacdn.com/lib/tildaicon/38383538-3562-4135-b663-353264363135/Layer_13.svg"
            class="t844__img t-img" imgfield="li_img__1531137309241" style="width:80px;"/>
          <div class="t844__wrappercenter ">
            <div class="t-heading t-heading_md" style="" field="li_title__1531137309241">2 telegram канала</div>
            <div class="t-descr t-descr_sm" style="" field="li_descr__1531137309241">
              <div style="text-align:center;" data-customstyle="yes">Канал со всей необходимой информацией по
                марафону.<br/><br/>Чат для постоянного общения на английском языке между участниками под нашим
                менторством.
              </div>
            </div>
          </div>
        </div>
        <div class="t844__col t-col t-col_4 t-align_center t-item"><img
            src="https://static.tildacdn.com/lib/tildaicon/34316630-3363-4536-b031-376431383362/Tilda_Icons_39_IT_startup.svg"
            class="t844__img t-img" imgfield="li_img__1531137326480" style="width:80px;"/>
          <div class="t844__wrappercenter ">
            <div class="t-heading t-heading_md" style="" field="li_title__1531137326480">бесконечная польза от
              книги<br/></div>
            <div class="t-descr t-descr_sm" style="" field="li_descr__1531137326480">Книга мотивирует к переменам,
              рассказывает, как добиваться результатов без насилия над собой, избавляться от вредных привычек и
              зависимостей,<br/><br/>+ как строить гармоничные отношения с окружающими и миром в целом.<br/></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="rec193470876" class="r t-rec t-rec_pt_150 t-rec_pb_150" style="padding-top:150px;padding-bottom:150px; "
       data-record-type="514"><!-- T514 -->
    <div class="t514">
      <div class="t-section__container t-container">
        <div class="t-col t-col_12">
          <div class="t-section__topwrapper t-align_center">
            <div class="t-section__title t-title t-title_xs" field="btitle">Программа марафона</div>
            <div class="t-section__descr t-descr t-descr_xl t-margin_auto" field="bdescr">Tuesday, March 14</div>
          </div>
        </div>
      </div>
      <div class="t-container">
        <div class="t514__row t-row">
          <div class="t514__leftcol t-col t-col_2 t-prefix_1 t-align_right">
            <div class="t514__time t-name t-name_md" style="" field="li_time__1477048862978">15 июня</div>
          </div>
          <div class="t514__rightcol t514__rightcol_1 t-col t-col_8">
            <div class="t514__righttablewrapper">
              <div class="t514__line" style=" top:4px;"></div>
              <div class="t514__timelinewrapper" style="">
                <div class="t514__circlewrapper" style="top:4px; ">
                  <div class="t514__circle" style=" "></div>
                </div>
              </div>
              <div class="t514__sectiontextwrapper t514__textwr-bottompadding">
                <div class="t514__time t514__time_mobile t-name t-name_md t514__bottommargin" style=""
                     field="li_time__1477048862978">15 июня
                </div>
                <div class="t514__title t-heading t-heading_xs" style="" field="li_title__1477048862978">Знакомимся,
                  изучаем материалы, заполняем чек-лист
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="t514__row t-row">
          <div class="t514__leftcol t-col t-col_2 t-prefix_1 t-align_right">
            <div class="t514__time t-name t-name_md" style="" field="li_time__1477048904073">18 июня</div>
          </div>
          <div class="t514__rightcol t514__rightcol_2 t-col t-col_8">
            <div class="t514__righttablewrapper">
              <div class="t514__line" style=" "></div>
              <div class="t514__timelinewrapper" style="">
                <div class="t514__circlewrapper" style="top:4px; ">
                  <div class="t514__circle" style=" background-color:#000; border: 2px solid #000;"></div>
                </div>
              </div>
              <div class="t514__sectiontextwrapper t514__textwr-bottompadding">
                <div class="t514__time t514__time_mobile t-name t-name_md t514__bottommargin" style=""
                     field="li_time__1477048904073">18 июня
                </div>
                <div class="t514__title t-heading t-heading_xs" style="" field="li_title__1477048904073">Вебинар: "Как
                  легко и эффективно читать на английском"
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="t514__row t-row">
          <div class="t514__leftcol t-col t-col_2 t-prefix_1 t-align_right">
            <div class="t514__time t-name t-name_md" style="" field="li_time__1477048948177">21 июня</div>
          </div>
          <div class="t514__rightcol t514__rightcol_3 t-col t-col_8">
            <div class="t514__righttablewrapper">
              <div class="t514__line" style=" "></div>
              <div class="t514__timelinewrapper" style="">
                <div class="t514__circlewrapper" style="top:4px; ">
                  <div class="t514__circle" style=" background-color:#000; border: 2px solid #000;"></div>
                </div>
              </div>
              <div class="t514__sectiontextwrapper t514__textwr-bottompadding">
                <div class="t514__time t514__time_mobile t-name t-name_md t514__bottommargin" style=""
                     field="li_time__1477048948177">21 июня
                </div>
                <div class="t514__title t-heading t-heading_xs t514__bottommargin" style=""
                     field="li_title__1477048948177">Разговорная встреча
                </div>
                <div class="t514__persontextwrapper t514__bottommargin">
                  <div class="t514__persname t-descr t-descr_xs" style="" field="li_persname__1477048948177">Обсуждаем первую главу
                  </div>
                </div>
                <div class="t514__text t-text t-text_sm" style="" field="li_text__1477048948177">1) "Every hero is a
                  product of situation"
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="t514__row t-row">
          <div class="t514__leftcol t-col t-col_2 t-prefix_1 t-align_right">
            <div class="t514__time t-name t-name_md" style="" field="li_time__1477048981221">27 июня</div>
          </div>
          <div class="t514__rightcol t514__rightcol_4 t-col t-col_8">
            <div class="t514__righttablewrapper">
              <div class="t514__line" style=" "></div>
              <div class="t514__timelinewrapper" style="">
                <div class="t514__circlewrapper" style="top:4px; ">
                  <div class="t514__circle" style=" background-color:#000; border: 2px solid #000;"></div>
                </div>
              </div>
              <div class="t514__sectiontextwrapper t514__textwr-bottompadding">
                <div class="t514__time t514__time_mobile t-name t-name_md t514__bottommargin" style=""
                     field="li_time__1477048981221">27 июня
                </div>
                <div class="t514__title t-heading t-heading_xs t514__bottommargin" style=""
                     field="li_title__1477048981221">Разговорная встреча
                </div>
                <div class="t514__persontextwrapper t514__bottommargin">
                  <div class="t514__persname t-descr t-descr_xs" style="" field="li_persname__1477048981221">Обсуждаем
                    главы 2-5
                  </div>
                </div>
                <div class="t514__text t-text t-text_sm" style="" field="li_text__1477048981221">2) "How your
                  environment shapes you"<br/>3) "Two types of "Enriched" environments<br/>4) "Reset your life"<br/>5)
                  "Designate a sacred space"
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="t514__row t-row">
          <div class="t514__leftcol t-col t-col_2 t-prefix_1 t-align_right">
            <div class="t514__time t-name t-name_md" style="" field="li_time__1477048999791">4 июля</div>
          </div>
          <div class="t514__rightcol t514__rightcol_5 t-col t-col_8">
            <div class="t514__righttablewrapper">
              <div class="t514__line" style=" "></div>
              <div class="t514__timelinewrapper" style="">
                <div class="t514__circlewrapper" style="top:4px; ">
                  <div class="t514__circle" style=" "></div>
                </div>
              </div>
              <div class="t514__sectiontextwrapper t514__textwr-bottompadding">
                <div class="t514__time t514__time_mobile t-name t-name_md t514__bottommargin" style=""
                     field="li_time__1477048999791">4 июля
                </div>
                <div class="t514__title t-heading t-heading_xs t514__bottommargin" style=""
                     field="li_title__1477048999791">Разговорная встреча
                </div>
                <div class="t514__persontextwrapper t514__bottommargin">
                  <div class="t514__persname t-descr t-descr_xs" style="" field="li_persname__1477048999791">Обсуждаем
                    главы 6-9
                  </div>
                </div>
                <div class="t514__text t-text t-text_sm" style="" field="li_text__1477048999791">6) "Remove everything
                  that conflicts with your decisions"<br/>7) "Change your default options"<br/>8) "Create triggers to
                  prevent self-sabotage"<br/>9) "Embed "forcing functions" into your environment
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="t514__row t-row">
          <div class="t514__leftcol t-col t-col_2 t-prefix_1 t-align_right">
            <div class="t514__time t-name t-name_md" style="" field="li_time__1477502585548">11 июля</div>
          </div>
          <div class="t514__rightcol t514__rightcol_6 t-col t-col_8">
            <div class="t514__righttablewrapper">
              <div class="t514__line" style=" "></div>
              <div class="t514__timelinewrapper" style="">
                <div class="t514__circlewrapper" style="top:4px; ">
                  <div class="t514__circle" style=" "></div>
                </div>
              </div>
              <div class="t514__sectiontextwrapper t514__textwr-bottompadding">
                <div class="t514__time t514__time_mobile t-name t-name_md t514__bottommargin" style=""
                     field="li_time__1477502585548">11 июля
                </div>
                <div class="t514__title t-heading t-heading_xs t514__bottommargin" style=""
                     field="li_title__1477502585548">Разговорная встреча
                </div>
                <div class="t514__persontextwrapper t514__bottommargin">
                  <div class="t514__persname t-descr t-descr_xs" style="" field="li_persname__1477502585548">Обсуждаем
                    главы 10-12
                  </div>
                </div>
                <div class="t514__text t-text t-text_sm" style="" field="li_text__1477502585548">10) "More than good
                  intentions"<br/>11) "Grow into your goals"<br/>12) "Rotate your environments"
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="t514__row t-row">
          <div class="t514__leftcol t-col t-col_2 t-prefix_1 t-align_right">
            <div class="t514__time t-name t-name_md" style="" field="li_time__1590147664426">15 июля</div>
          </div>
          <div class="t514__rightcol t514__rightcol_7 t-col t-col_8">
            <div class="t514__righttablewrapper">
              <div class="t514__line" style=" "></div>
              <div class="t514__timelinewrapper" style="">
                <div class="t514__circlewrapper" style="top:4px; ">
                  <div class="t514__circle" style=" "></div>
                </div>
              </div>
              <div class="t514__sectiontextwrapper t514__textwr-bottompadding">
                <div class="t514__time t514__time_mobile t-name t-name_md t514__bottommargin" style=""
                     field="li_time__1590147664426">15 июля
                </div>
                <div class="t514__title t-heading t-heading_xs t514__bottommargin" style=""
                     field="li_title__1590147664426">Разговорная встреча
                </div>
                <div class="t514__persontextwrapper t514__bottommargin">
                  <div class="t514__persname t-descr t-descr_xs" style="" field="li_persname__1590147664426">Обсуждаем
                    главы 13-14
                  </div>
                </div>
                <div class="t514__text t-text t-text_sm" style="" field="li_text__1590147664426">13) "Find unique
                  collaborations"<br/>14) "Never forget where you came from"
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="t514__row t-row">
          <div class="t514__leftcol t-col t-col_2 t-prefix_1 t-align_right">
            <div class="t514__time t-name t-name_md" style="" field="li_time__1590147824541">16 июля</div>
          </div>
          <div class="t514__rightcol t514__rightcol_8 t-col t-col_8">
            <div class="t514__righttablewrapper">
              <div class="t514__line" style=" "></div>
              <div class="t514__timelinewrapper" style="">
                <div class="t514__circlewrapper" style="top:4px; ">
                  <div class="t514__circle" style=" "></div>
                </div>
              </div>
              <div class="t514__sectiontextwrapper t514__textwr-bottompadding">
                <div class="t514__time t514__time_mobile t-name t-name_md t514__bottommargin" style=""
                     field="li_time__1590147824541">16 июля
                </div>
                <div class="t514__title t-heading t-heading_xs t514__bottommargin" style=""
                     field="li_title__1590147824541">Вебинар: "Английский как стиль жизни"
                </div>
                <div class="t514__persontextwrapper ">
                  <div class="t514__persname t-descr t-descr_xs" style="" field="li_persname__1590147824541">+ отвечаем
                    на вопросы
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="t-section__container t-container">
        <div class="t-col t-col_12">
          <div class="t-section__bottomwrapper t-clear t-align_center "><a href="" target="" class="t-btn" style="color:#ffffff;background-color:#1f5bff;border-radius:30px; -moz-border-radius:30px; -webkit-border-radius:30px;">
              <table style="width:100%; height:100%;">
                <tr>
                  <td>Присоединиться к марафону</td>
                </tr>
              </table>
            </a></div>
        </div>
      </div>
    </div>

  </div>
  <div id="rec193476111" class="r t-rec t-rec_pt_150 t-rec_pb_150" style="padding-top:150px;padding-bottom:150px; "
       data-record-type="510"><!-- t510 -->
    <div class="t510">
      <div class="t-section__container t-container">
        <div class="t-col t-col_12">
          <div class="t-section__topwrapper t-align_center">
            <div class="t-section__title t-title t-title_xs" field="btitle">Этот марафон для тебя, если:</div>
          </div>
        </div>
      </div>
      <div class="t-container">
        <div class="t-col t-col_8 t-prefix_2 t-item">
          <div class="t-cell t-valign_top">
            <div class="t510__circle t-heading t-valign_top" style=" color:#1f5bff;; border: 2px solid #1f5bff; ">1
            </div>
          </div>
          <div class="t510__textwrapper t-cell t-valign_top" style="">
            <div class="t-name t-name_md t510__bottommargin" style="" field="li_title__1476966581869">хочешь научиться с
              легкостью читать на английском
            </div>
            <div class="t-descr t-descr_sm" style="" field="li_descr__1476966581869">Мы поделили книгу таким образом,
              что тебе не потребуется особых усилий, чтобы её прочесть. + Мы расскажем, на что нужно обращать внимание
              при чтении и как получать пользу от прочитанного.
            </div>
          </div>
        </div>
        <div class="t-clear t510__separator" style=""></div>
        <div class="t-col t-col_8 t-prefix_2 t-item">
          <div class="t-cell t-valign_top">
            <div class="t510__circle t-heading t-valign_top" style=" color:#1f5bff;; border: 2px solid #1f5bff; ">2
            </div>
          </div>
          <div class="t510__textwrapper t-cell t-valign_top" style="">
            <div class="t-name t-name_md t510__bottommargin" style="" field="li_title__1476966593578">интересуешься темой саморазвития
            </div>
            <div class="t-descr t-descr_sm" style="" field="li_descr__1476966593578">Willpower doesn't work - эта книга отличается от большинства подобных тем, что подробно, на уровне физиологии описывает почему мы живем не правильно, и как это можно изменить.<br/>Всем кто брал себя в руки уже тысячи раз, и каждый раз «сдавался» – обязательно к прочтению
            </div>
          </div>
        </div>
        <div class="t-clear t510__separator" style=""></div>
        <div class="t-col t-col_8 t-prefix_2 t-item">
          <div class="t-cell t-valign_top">
            <div class="t510__circle t-heading t-valign_top" style=" color:#1f5bff;; border: 2px solid #1f5bff; ">3
            </div>
          </div>
          <div class="t510__textwrapper t-cell t-valign_top" style="">
            <div class="t-name t-name_md t510__bottommargin" style="" field="li_title__1476966597622">хочешь
              познакомиться с такими же увлеченными людьми, как ты
            </div>
            <div class="t-descr t-descr_sm" style="" field="li_descr__1476966597622">В нашем чате всегда есть что и с
              кем обсудить. Присоединяйся:)
            </div>
          </div>
        </div>
        <div class="t-clear t510__separator" style=""></div>
        <div class="t-col t-col_8 t-prefix_2 t-item">
          <div class="t-cell t-valign_top">
            <div class="t510__circle t-heading t-valign_top" style=" color:#1f5bff;; border: 2px solid #1f5bff; ">4
            </div>
          </div>
          <div class="t510__textwrapper t-cell t-valign_top" style="">
            <div class="t-name t-name_md t510__bottommargin" style="" field="li_title__1589972036520">хочешь заговорить
              на английском
            </div>
            <div class="t-descr t-descr_sm" style="" field="li_descr__1589972036520">Много разговорной практики в чатах:
              пиши сообщения, записывай и слушай голосовые, общайся с другими участниками марафона. + Каждую неделю мы
              ждем тебя на разговорных встречах.
            </div>
          </div>
        </div>
        <div class="t-clear t510__separator" style=""></div>
        <div class="t-col t-col_8 t-prefix_2 t-item">
          <div class="t-cell t-valign_top">
            <div class="t510__circle t-heading t-valign_top" style=" color:#1f5bff;; border: 2px solid #1f5bff; ">5
            </div>
          </div>
          <div class="t510__textwrapper t-cell t-valign_top" style="">
            <div class="t-name t-name_md t510__bottommargin" style="" field="li_title__1589972300946">твой уровень:
              Intermediate(B1) и выше
            </div>
            <div class="t-descr t-descr_sm" style="" field="li_descr__1589972300946">Доступный язык, минимум сложной
              терминологии и простые примеры из жизни.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="rec193468469" class="r t-rec t-rec_pt_150 t-rec_pb_150" style="padding-top:150px;padding-bottom:150px; "
       data-record-type="490"><!-- t490 -->
    <div class="t490">
      <div class="t-section__container t-container">
        <div class="t-col t-col_12">
          <div class="t-section__topwrapper t-align_center">
            <div class="t-section__title t-title t-title_xs" field="btitle">Организаторы марафона</div>
            <div class="t-section__descr t-descr t-descr_xl t-margin_auto" field="bdescr">Мы здесь, чтобы прокачать твой
              английский.
            </div>
          </div>
        </div>
      </div>
      <div class="t-container">
        <div class="t490__col t-col t-col_6 t-align_center t-item">
          <img src="/img/avatar_anastasia.jpg" class="t490__img t-img" imgfield="li_img__1476968690512"/>
          <div class="t490__wrappercenter ">
            <div class="t-heading t-heading_md" style="" field="li_title__1476968690512">Анастасия</div>
            <div class="t-descr t-descr_xs" style="" field="li_descr__1476968690512">Я специалист в области
              межкультурной коммуникации, content manager. Знание английского примерно где-то между обсудить очередной
              сериал на netflix и написать статью про криптовалюту и блокчейн. За идею: язык - не самоцель, а средство.
            </div>
          </div>
        </div>
        <div class="t490__col t-col t-col_6 t-align_center t-item"><img src="/img/avatar_aleksandra.jpg"
            class="t490__img t-img" imgfield="li_img__1476968700508"/>
          <div class="t490__wrappercenter ">
            <div class="t-heading t-heading_md" style="" field="li_title__1476968700508">Александра</div>
            <div class="t-descr t-descr_xs" style="" field="li_descr__1476968700508">Я сертифицированный преподаватель и
              переводчик с 3-х летним опытом. Имею сертификат CAE. Расскажу , как свободно говорить на английском.
              Научу, как перестать бояться языка и прокачать свой уровень.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="rec193458105" class="r t-rec" style=" " data-record-type="215"><a name="registration"
                                                                             style="font-size:0;"></a></div>
  <div id="rec193477224" class="r t-rec t-rec_pt_150 t-rec_pb_150" style="padding-top:150px;padding-bottom:150px; "
       data-animationappear="off" data-record-type="598"><!-- T598 -->
    <div class="t598">
      <div class="t-section__container t-container">
        <div class="t-col t-col_12">
          <div class="t-section__topwrapper t-align_center">
            <div class="t-section__title t-title t-title_xs" field="btitle">Присоединяйся к марафону</div>
            <div class="t-section__descr t-descr t-descr_xl t-margin_auto" field="bdescr">Вернем стоимость марафона
              самому активному участнику! <br/>Мы заинтересованы в твоих результатах.
            </div>
          </div>
        </div>
      </div>
      <div class="t-container">
        <div class="t598__col t-col t-col_4 t-align_center">
          <div class="t598__content">
            <div class="t598__imgwrapper">
              <div class="t598__bgimg t598__img_circle t-margin_auto t-bgimg" bgimgfield="img"
                   data-original="https://static.tildacdn.com/tild6233-6436-4535-a334-393931653636/7.svg"
                   style=" background-image: url('https://static.tildacdn.com/tild6233-6436-4535-a334-393931653636/7.svg');"></div>
            </div>
            <div class="t598__title t-name t-name_xl" field="title" style=" ">Базовый</div>
            <div class="t598__descr t-descr t-descr_xs" field="descr" style=" ">
              <ul>
                <li> Электронная версия книги</li>
                <li>Доступ в 2 telegram канала</li>
                <li>2 вебинара</li>
              </ul>
            </div>
            <div class="t598__price t-name t-name_md" field="price" style=" ">440 ₽</div>
            <a href="" target="_blank" class="t598__btn t-btn t-btn_sm"
               style="color:#ffffff;background-color:#13ce66;border-radius:30px; -moz-border-radius:30px; -webkit-border-radius:30px;">
              <table style="width:100%; height:100%;">
                <tr>
                  <td>Join now</td>
                </tr>
              </table>
            </a></div>
        </div>
        <div class="t598__col t-col t-col_4 t-align_center">
          <div class="t598__line_mobile" style="background-color: #e0e6ed;"></div>
          <div class="t598__content">
            <div class="t598__imgwrapper">
              <div class="t598__bgimg t598__img_circle t-margin_auto t-bgimg" bgimgfield="img2"
                   data-original="https://static.tildacdn.com/tild3165-3839-4136-b538-333563333037/7.svg"
                   style=" background-image: url('https://static.tildacdn.com/tild3165-3839-4136-b538-333563333037/7.svg');"></div>
            </div>
            <div class="t598__title t-name t-name_xl" field="title2" style=" ">Стандартный</div>
            <div class="t598__descr t-descr t-descr_xs" field="descr2" style=" ">
              <ul>
                <li>Всё, что в "Базовом" +</li>
                <li>Гайд с лексическим разбором по главам</li>
                <li>Лексические подборки (список основных терминов, конспекты по главам, подборка часто используемых
                  слов)
                </li>
                <li>Трекер результатов</li>
                <li>Задания на отработку материала</li>
                <li>Карточки в Quizlet для запоминания</li>
                <li>4 разговорных встречи</li>
              </ul>
            </div>
            <div class="t598__price t-name t-name_md" field="price2" style=" ">
              <del>1440</del>
              ₽<br/>900 ₽
            </div>
            <a href="" target="" class="t598__btn t-btn t-btn_sm"
               style="color:#ffffff;background-color:#13ce66;border-radius:30px; -moz-border-radius:30px; -webkit-border-radius:30px;">
              <table style="width:100%; height:100%;">
                <tr>
                  <td>Join now</td>
                </tr>
              </table>
            </a></div>
          <div class="t598__line" style="background-color: #e0e6ed;"></div>
        </div>
        <div class="t598__col t-col t-col_4 t-align_center">
          <div class="t598__line_mobile" style="background-color: #e0e6ed;"></div>
          <div class="t598__content">
            <div class="t598__imgwrapper">
              <div class="t598__bgimg t598__img_circle t-margin_auto t-bgimg" bgimgfield="img3"
                   data-original="https://static.tildacdn.com/tild3964-3761-4838-a161-656231343965/7.svg"
                   style=" background-image: url('https://static.tildacdn.com/tild3964-3761-4838-a161-656231343965/7.svg');"></div>
            </div>
            <div class="t598__title t-name t-name_xl" field="title3" style=" ">Продвинутый</div>
            <div class="t598__descr t-descr t-descr_xs" field="descr3" style=" ">
              <ul>
                <li>Всё, что в "Cтандартном" +</li>
                <li>Проверка домашней работы</li>
                <li>Личная консультация раз в неделю</li>
                <li>Поддержка 24/7</li>
              </ul>
            </div>
            <div class="t598__price t-name t-name_md" field="price3" style=" ">
              <del>2190</del>
              ₽<br/>1590 ₽
            </div>
            <a href="" target="" class="t598__btn t-btn t-btn_sm"
               style="color:#ffffff;background-color:#13ce66;border-radius:30px; -moz-border-radius:30px; -webkit-border-radius:30px;">
              <table style="width:100%; height:100%;">
                <tr>
                  <td>Join now</td>
                </tr>
              </table>
            </a></div>
          <div class="t598__line" style="background-color: #e0e6ed;"></div>
        </div>
      </div>
    </div>

  </div>
  <div id="rec194355970" class="r t-rec t-rec_pt_135 t-rec_pb_150"
       style="padding-top:135px;padding-bottom:150px;background-color:#ffe100; " data-animationappear="off"
       data-record-type="704" data-bg-color="#ffe100"><!-- T704 -->
    <div class="t704">
      <div class="t-container">
        <div class="t-col t-col_12 t-align_center">
          <div class="t704__text-wrapper">
            <div class="t704__title t-title t-title_sm t-margin_auto" style="" field="title">Не решаешься присоединиться
              к марафону?
            </div>
            <div class="t704__descr t-descr t-descr_xl t-margin_auto" style="max-width:600px;" field="descr">Сделай
              первый шаг, получи в подарок гайд по эффективному и легкому чтению на английском языке.
            </div>
          </div>
          <div>
            <form id="form194355970" name='form194355970' role="form" action='' method='POST' data-formactiontype="0"
                  data-inputbox=".t-input-group" class="t-form js-form-proccess t-form_inputs-total_1 "
                  data-success-callback="t704_onSuccess"> <!-- NO ONE SERVICES CONNECTED -->
              <div class="js-successbox t-form__successbox t-text t-text_md" style="display:none;"></div>
              <div class="t-form__inputsbox">
                <div class="t-input-group t-input-group_em" data-input-lid="1496321990615">
                  <div class="t-input-block"><input type="text" name="Email" class="t-input js-tilda-rule " value="" placeholder="Your E-mail" data-tilda-rule="email" style="color:#000000; background-color:#ffffff; ">
                    <div class="t-input-error"></div>
                  </div>
                </div>
                <div class="t-form__errorbox-middle">
                  <div class="js-errorbox-all t-form__errorbox-wrapper" style="display:none;">
                    <div class="t-form__errorbox-text t-text t-text_md"><p
                        class="t-form__errorbox-item js-rule-error js-rule-error-all"></p>
                      <p class="t-form__errorbox-item js-rule-error js-rule-error-req"></p>
                      <p class="t-form__errorbox-item js-rule-error js-rule-error-email"></p>
                      <p class="t-form__errorbox-item js-rule-error js-rule-error-name"></p>
                      <p class="t-form__errorbox-item js-rule-error js-rule-error-phone"></p>
                      <p class="t-form__errorbox-item js-rule-error js-rule-error-minlength"></p>
                      <p class="t-form__errorbox-item js-rule-error js-rule-error-string"></p></div>
                  </div>
                </div>
                <div class="t-form__submit">
                  <button type="submit" class="t-submit"
                          style="color:#ffffff;background-color:#000000;border-radius:30px; -moz-border-radius:30px; -webkit-border-radius:30px;">
                    Получить гайд
                  </button>
                </div>
              </div>
              <div class="t-form__errorbox-bottom">
                <div class="js-errorbox-all t-form__errorbox-wrapper" style="display:none;">
                  <div class="t-form__errorbox-text t-text t-text_md"><p
                      class="t-form__errorbox-item js-rule-error js-rule-error-all"></p>
                    <p class="t-form__errorbox-item js-rule-error js-rule-error-req"></p>
                    <p class="t-form__errorbox-item js-rule-error js-rule-error-email"></p>
                    <p class="t-form__errorbox-item js-rule-error js-rule-error-name"></p>
                    <p class="t-form__errorbox-item js-rule-error js-rule-error-phone"></p>
                    <p class="t-form__errorbox-item js-rule-error js-rule-error-minlength"></p>
                    <p class="t-form__errorbox-item js-rule-error js-rule-error-string"></p></div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
  <div id="rec193458107" class="r t-rec t-rec_pt_150 t-rec_pb_150"
       style="padding-top:150px;padding-bottom:150px;background-color:#000000; " data-record-type="551"
       data-bg-color="#000000"><!-- t551-->
    <div class="t551">
      <div class="t-container">
        <div class="t-col t-col_6 t-prefix_3 t-align_center">
          <div class="t551__title t-name t-name_xs" style="color:#ffffff;letter-spacing:1px;" field="title"
               data-animate-order="1">ПИШИТЕ НАМ, ЕСЛИ У ВАС ЕСТЬ ВОПРОСЫ:<br/></div>
          <div class="t-sociallinks">
            <div class="t-sociallinks__wrapper">
              <div class="t-sociallinks__item"><a href="/" target="_blank">
                  <svg class="t-sociallinks__svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                       xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="48px" height="48px"
                       viewBox="0 0 48 48" enable-background="new 0 0 48 48" xml:space="preserve"><desc>Facebook</desc>
                    <path style="fill:#ffffff;"
                          d="M47.761,24c0,13.121-10.638,23.76-23.758,23.76C10.877,47.76,0.239,37.121,0.239,24c0-13.124,10.638-23.76,23.764-23.76C37.123,0.24,47.761,10.876,47.761,24 M20.033,38.85H26.2V24.01h4.163l0.539-5.242H26.2v-3.083c0-1.156,0.769-1.427,1.308-1.427h3.318V9.168L26.258,9.15c-5.072,0-6.225,3.796-6.225,6.224v3.394H17.1v5.242h2.933V38.85z"/></svg>
                </a></div>
              <div class="t-sociallinks__item"><a href="/" target="_blank">
                  <svg class="t-sociallinks__svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                       xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="48px" height="48px"
                       viewBox="0 0 48 48" enable-background="new 0 0 48 48" xml:space="preserve"><desc>Youtube</desc>
                    <path style="fill:#ffffff;"
                          d="M24 0.0130005C37.248 0.0130005 47.987 10.753 47.987 24C47.987 37.247 37.247 47.987 24 47.987C10.753 47.987 0.0130005 37.247 0.0130005 24C0.0130005 10.753 10.752 0.0130005 24 0.0130005ZM35.815 18.093C35.565 16.756 34.452 15.758 33.173 15.635C30.119 15.439 27.054 15.28 23.995 15.278C20.936 15.276 17.882 15.432 14.828 15.625C13.544 15.749 12.431 16.742 12.182 18.084C11.898 20.017 11.756 21.969 11.756 23.92C11.756 25.871 11.898 27.823 12.182 29.756C12.431 31.098 13.544 32.21 14.828 32.333C17.883 32.526 20.935 32.723 23.995 32.723C27.053 32.723 30.121 32.551 33.173 32.353C34.452 32.229 35.565 31.084 35.815 29.747C36.101 27.817 36.244 25.868 36.244 23.919C36.244 21.971 36.101 20.023 35.815 18.093ZM21.224 27.435V20.32L27.851 23.878L21.224 27.435Z"/></svg>
                </a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
