#!/bin/bash
set -xe

if [ $TRAVIS_BRANCH == 'master' ] ; then
  eval "$(ssh-agent -s)"
  ssh-add ~/.ssh/id_rsa

  git init

  git config user.name "Dan"
  git config user.email "b5014133@my.shu.ac.uk"

  git pull origin master
  # git add .
  # git commit -m "Deploy"
  # git push --force deploy master
else
  echo "Not deploying, since this branch isn't master."
fi
