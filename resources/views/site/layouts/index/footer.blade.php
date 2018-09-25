<footer>
    <div class="footer container">
        <div class="footer-lang-block">
            <div id="f-lang" class="footer-lang">
                <span class="footer-lang-item footer-txt">{{ config('app.locale') }}</span>
                <div class="arrow-lang">
                    <svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 121.4 72.4" style="enable-background:new 0 0 121.4 72.4;" xml:space="preserve">
					<style type="text/css">
                        .st0{fill:#fff;}
                    </style>
                        <title>^</title>
                        <g id="Layer_4">
                            <path class="st0" d="M51.4,68.5c5.2,5.1,13.5,5.1,18.6,0l47.3-47.3c5.1-5.1,5.5-13.2,0.8-17.9s-12.8-4.4-17.9,0.8L70,34.2
							c-5.2,5.1-13.5,5.1-18.6,0L21.2,4.1C16.1-1.1,8-1.4,3.3,3.3s-4.4,12.8,0.7,17.9L51.4,68.5z"/>
                        </g>
					</svg>
                </div>
            </div>
            <div class="footer-choose">
                <span class="footer-choose-item footer-txt" style="{{ config('app.locale') === 'ru' ? 'display: none;' : ''}}">ru</span>
                <span class="footer-choose-item footer-txt"  style="{{ config('app.locale') === 'en' ? 'display: none;' : ''}}">en</span>
            </div>
            <div class="page-block">
                <span class="page-txt">© 2014-2018 fresh films. all rights reserved.</span>
            </div>
        </div>
        <div class="footer-social">
            <a class="footer-social-item footer-txt" href="#">fb.</a>
            <a class="footer-social-item footer-txt" href="#">in.</a>
            <a class="footer-social-item footer-txt" href="#">vm.</a>
        </div>
    </div>
</footer>
