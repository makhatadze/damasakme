const sharedData = usePage().props.localization;


export function __(key, replace = {}) {
    keys = key.split('.');
    var translation = this.$page.props.language;
    keys.forEach(function(keyTmp){
        translation = translation[keyTmp]
            ? translation[keyTmp]
            : keyTmp
    });

    Object.keys(replace).forEach(function (key) {
        translation = translation.replace(':' + key, replace[key])
    });

    return translation
}
