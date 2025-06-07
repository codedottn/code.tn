jQuery(document).ready(function($) {
    // Create accessibility panel
    const accessibilityPanel = `
        <div class="accessibility-panel" style="display: none;">
            <h3>Accessibility Options</h3>
            <div class="accessibility-option">
                <button id="toggle-dyslexia">Toggle Dyslexia Font</button>
            </div>
            <div class="accessibility-option">
                <button id="toggle-contrast">Toggle High Contrast</button>
            </div>
            <div class="accessibility-option">
                <button id="toggle-color-blind">Toggle Color Blind Mode</button>
            </div>
            <div class="accessibility-option">
                <label>Text Size:</label>
                <select id="text-size">
                    <option value="small">Small</option>
                    <option value="medium" selected>Medium</option>
                    <option value="large">Large</option>
                </select>
            </div>
            <button id="close-panel" class="close-button">×</button>
        </div>
    `;

    // Create text-to-speech controls
    const ttsControls = `
        <div class="text-to-speech-controls">
            <button id="read-page">Read Page</button>
            <button id="stop-reading">Stop</button>
            <select id="voice-select">
                <option value="">Select Voice</option>
            </select>
        </div>
    `;

    // Create accessibility toggle button
    const toggleButton = `
        <button class="accessibility-toggle" id="accessibility-toggle">
            <span class="screen-reader-text">Accessibility Options</span>
            <span aria-hidden="true">♿</span>
        </button>
    `;

    // Add elements to the page
    $('body').append(accessibilityPanel);
    $('body').append(ttsControls);
    $('body').append(toggleButton);

    // Add skip to content link
    $('body').prepend('<a href="#main-content" class="skip-to-content">Skip to Content</a>');

    // Show/hide accessibility panel
    $('#accessibility-toggle').click(function() {
        $('.accessibility-panel').slideToggle(300);
    });

    // Close panel button
    $('#close-panel').click(function() {
        $('.accessibility-panel').slideUp(300);
    });

    // Admin bar menu click handler
    $('.accessibility-menu').click(function(e) {
        e.preventDefault();
        $('.accessibility-panel').slideToggle(300);
    });

    // Text-to-speech functionality
    let speechSynthesis = window.speechSynthesis;
    let currentUtterance = null;

    // Populate voice options
    function populateVoices() {
        const voices = speechSynthesis.getVoices();
        const voiceSelect = $('#voice-select');
        voiceSelect.empty();
        
        voices.forEach(voice => {
            const option = $('<option>')
                .val(voice.name)
                .text(`${voice.name} (${voice.lang})`);
            voiceSelect.append(option);
        });
    }

    // Load voices when they become available
    if (speechSynthesis.onvoiceschanged !== undefined) {
        speechSynthesis.onvoiceschanged = populateVoices;
    }

    // Read page content
    $('#read-page').click(function() {
        if (currentUtterance) {
            speechSynthesis.cancel();
        }

        const text = $('main').text();
        const selectedVoice = $('#voice-select').val();
        const voices = speechSynthesis.getVoices();
        const voice = voices.find(v => v.name === selectedVoice) || voices[0];

        currentUtterance = new SpeechSynthesisUtterance(text);
        currentUtterance.voice = voice;
        currentUtterance.rate = 0.9;
        currentUtterance.pitch = 1;

        speechSynthesis.speak(currentUtterance);
    });

    // Stop reading
    $('#stop-reading').click(function() {
        speechSynthesis.cancel();
        currentUtterance = null;
    });

    // Toggle dyslexia font
    $('#toggle-dyslexia').click(function() {
        $('body').toggleClass('dyslexia-mode');
    });

    // Toggle high contrast
    $('#toggle-contrast').click(function() {
        $('body').toggleClass('high-contrast');
    });

    // Toggle color blind mode
    $('#toggle-color-blind').click(function() {
        $('body').toggleClass('color-blind-mode');
    });

    // Change text size
    $('#text-size').change(function() {
        $('body').removeClass('text-size-small text-size-medium text-size-large');
        $('body').addClass(`text-size-${$(this).val()}`);
    });
}); 