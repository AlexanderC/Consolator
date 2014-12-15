#!/bin/bash

PHP="php"
UUID=$(cat /dev/urandom | env LC_CTYPE=C tr -dc 'a-zA-Z0-9' | fold -w 32 | head -n 1)
BINARY_PATH=$(dirname ${PHP})
CSL_BINARY="https://raw.githubusercontent.com/AlexanderC/Consolator/master/build/consolator.phar?___="${UUID}
CSL_INCLUDE="https://raw.githubusercontent.com/AlexanderC/Consolator/master/build/consolator.noshebang.phar?___="${UUID}
INCLUDE_PATH=$(${PHP} -r "echo rtrim(explode(':', ltrim(get_include_path(), '.:'))[0], '/');")

# add library
echo "+ Remote library path "${CSL_INCLUDE}
echo "+ Adding consolator.phar to include path "${INCLUDE_PATH}
rm -f ${INCLUDE_PATH}"/consolator.phar"
curl -XGET ${CSL_INCLUDE} --output ${INCLUDE_PATH}"/consolator.phar" --progress-bar --insecure

# add binary
echo "+ Remote binary path "${CSL_BINARY}
echo "+ Adding consolator to the binaries path "${BINARY_PATH}" using binary url "${CSL_BINARY}
rm -f ${BINARY_PATH}"/consolator"
curl -XGET ${CSL_BINARY} --output ${BINARY_PATH}"/consolator" --progress-bar --insecure
chmod a+x ${BINARY_PATH}"/consolator"

echo "  Done!"
exit 0