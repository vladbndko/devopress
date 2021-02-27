install:
	npm install

dev:
	npm run gulp:dev

pot:
	wp i18n make-pot . languages/devocraft.pot

favicon:
	npm run gulp:favicon

emails:
	npm run gulp:emails
