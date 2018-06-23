#!/bin/bash
set -xe

if [ $TRAVIS_BRANCH == 'master' ] ; then
  eval "$(ssh-agent -s)"
  ssh-add ~/.ssh/id_rsa

  cd public
  git init

  git remote add deploy "travis@danjscott.co.uk:/var/www/ukce.danjscott.co.uk/work-dir"
  git config user.name "Dan"
  git config user.email "b5014133@my.shu.ac.uk"

  git add .
  git commit -m "Deploy"
  git push --force deploy master
else
  echo "Not deploying, since this branch isn't master."
fi
