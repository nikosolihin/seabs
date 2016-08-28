# WP Starter Project

## Installation
#### Local Wordpress
Go to the `www` directory of Vagrant and run:
```bash
git clone https://github.com/nikosolihin/wp-starter.git MyApp && cd $_
find ./ -type f -maxdepth 1 -exec sed -i '' -e 's/saat/myapp/g' {} \;
cd ../..
vagrant up --provision
```

#### Build Tool
Integrate [Gulp Starter](https://github.com/vigetlabs/gulp-starter) into the development workflow:
```bash
svn checkout https://github.com/vigetlabs/gulp-starter/trunk/src src
svn checkout https://github.com/vigetlabs/gulp-starter/trunk/gulpfile.js gulpfile.js
svn export https://github.com/vigetlabs/gulp-starter/trunk/package.json
```
Edit `name`, `version` and `description` in `package.json`.

```
rm -rf ./src/html ./src/images
rm -rf ./gulpfile.js/tasks/html.js ./gulpfile.js/tasks/images.js
npm install
```

#### Initial Commit
To use this as a new project, clear out the `git` data and start a fresh history:

```bash
rm -rf .git && git init
echo "htdocs/" >> .gitignore # We can now ignore the destination folder
git add .
git commit -m 'Allons-y!'
```

#### Setting up remote
Prepare the production server for deployment using this [gist](https://gist.github.com/nikosolihin/7b4eabe087ccec339eca6d8e60d1c56f#file-prep-sh-L5):
```bash
ssh -i .ssh/KEYNAME user@host
cd ~
curl -O https://gist.githubusercontent.com/nikosolihin/7b4eabe087ccec339eca6d8e60d1c56f/raw/7e433ce5a235e1b150d2eeb2fec9c1f0d664b42a/prep.sh
chmod +x prep.sh && ./$_
```
Create a new Github repo without .gitignore and README.md. Then add the new origin and production remotes:
```bash
git remote add origin https://github.com/USERNAME/REPOSITORYURL.git
git remote add production ssh://user@host/~/git/prod.git
```
