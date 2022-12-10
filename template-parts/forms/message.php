<?php

/* @var array $args */

?>

<form x-data="messageForm" @submit.prevent="submit" x-clock>
    <input type="hidden" value="<?php echo get_permalink( get_the_ID() ); ?>" x-ref="source">
    <?php if ( get_theme_option( 'recaptcha_enabled' ) ) : ?>
        <input type="hidden" value="<?php echo get_theme_option( 'recaptcha_site_key' ); ?>" x-ref="siteKey">
    <?php endif; ?>
    <div class="form-group">
        <label for="name" class="form-label">Name</label>
        <input
            id="name"
            class="form-control"
            placeholder="Your Name"
            aria-label="You Name"
            x-model="body.name"
            :disabled="loading"
            @input.debounce.200ms="handleChange('name')"
        >
        <div class="form-message is-invalid" x-text="errors.name ? errors.name[0] : ''"></div>
    </div>
    <div class="form-group">
        <label for="email" class="form-label">Email</label>
        <input
            id="email"
            class="form-control"
            type="email"
            placeholder="Your Email"
            aria-label="You Email"
            x-model="body.email"
            :disabled="loading"
            @input.debounce.200ms="handleChange('email')"
        >
        <div class="form-message is-invalid" x-text="errors.email ? errors.email[0] : ''"></div>
    </div>
    <div class="form-group">
        <label for="message" class="form-label">Message</label>
        <textarea
            id="message"
            class="form-control"
            rows="5"
            placeholder="Your Message"
            aria-label="You Message"
            x-model="body.message"
            :disabled="loading"
            @input.debounce.200ms="handleChange('message')"
        ></textarea>
        <div class="form-message is-invalid" x-text="errors.message ? errors.message[0] : ''"></div>
    </div>
    <div class="form-group">
        <input
            id="accept"
            class="form-check"
            type="checkbox"
            aria-label="Private Policy"
            x-model="accept"
            :disabled="loading"
        >
        <label class="form-label" for="accept">
            I have read and accept
            <a href="<?php echo get_privacy_policy_url(); ?>" target="_blank">the privacy policy</a>
        </label>
    </div>
    <button class="btn is-primary" x-bind="button">
        Send
    </button>
</form>
