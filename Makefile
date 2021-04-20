install:
	composer install; npm install

dev:
	npm run development

watch:
	npm run watch-poll

prod:
	npm run production

favicon:
	npm run favicon

pot:
	wp i18n make-pot . languages/devopress.pot

mailhog:
	~/go/bin/MailHog

src = assets/images/raw/
dest = assets/images/
compress:
	npx @squoosh/cli ${src}${image} -d ${dest} --${encoder} ${options}
