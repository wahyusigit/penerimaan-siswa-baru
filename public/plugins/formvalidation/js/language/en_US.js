(function($) {
    /**
     * Default English package
     * It's included in the dist, so you do NOT need to include it to your head tag
     * The only reason I put it here is that you can clone it, and translate it into your language
     */
    $.fn.bootstrapValidator.i18n = $.extend(true, $.fn.bootstrapValidator.i18n, {
        base64: {
            'default': 'Harap masukkan basis 64 yang benar yang dikodekan'
        },
        between: {
            'default': 'Harap masukkan nilai antara %s dan %s',
            notInclusive: 'Harap masukkan nilai antara %s dan %s secara ketat'
        },
        callback: {
            'default': 'Harap masukkan nilai yang valid'
        },
        choice: {
            'default': 'Harap masukkan nilai yang valid',
            less: 'Silahkan pilih opsi %s minimal',
            more: 'Silahkan pilih opsi %s maksimal',
            between: 'Silahkan pilih opsi %s - %s'
        },
        creditCard: {
            'default': 'Mohon masukan nomor kartu kredit dengan benar'
        },
        cusip: {
            'default': 'Harap masukkan nomor CUSIP dengan benar'
        },
        cvv: {
            'default': 'Harap masukkan nomor CVV dengan benar'
        },
        date: {
            'default': 'Harap masukkan tanggal dengan benar'
        },
        different: {
            'default': 'Harap masukkan angka/huruf yang berbeda'
        },
        digits: {
             'default': 'Harap masukkan angka'
        },
        ean: {
            'default': 'Masukkan nomor EAN dengan benar'
        },
        emailAddress: {
            'default': 'Masukkan alamat email dengan benar'
        },
        file: {
            'default': 'Harap pilih file dengan benar'
        },
        greaterThan: {
            'default': 'Harap masukkan nilai yang lebih besar dari atau sama dengan %s',
            notInclusive: 'Harap masukkan nilai lebih besar dari %s'
        },
        grid: {
            'default': 'Harap masukkan nomor GRId dengan benar'
        },
        hex: {
            'default': 'Harap masukkan nomor heksadesimal dengan benar'
        },
        hexColor: {
            'default': 'Harap masukkan warna hex dengan benar'
        },
        iban: {
            'default': 'Masukkan nomor IBAN dengan benar',
            countryNotSupported: 'Kode negara %s tidak didukung',
            country: 'Masukkan nomor IBAN yang benar di %s',
            countries: {
                AD: 'Andorra',
                AE: 'United Arab Emirates',
                AL: 'Albania',
                AO: 'Angola',
                AT: 'Austria',
                AZ: 'Azerbaijan',
                BA: 'Bosnia and Herzegovina',
                BE: 'Belgium',
                BF: 'Burkina Faso',
                BG: 'Bulgaria',
                BH: 'Bahrain',
                BI: 'Burundi',
                BJ: 'Benin',
                BR: 'Brazil',
                CH: 'Switzerland',
                CI: 'Ivory Coast',
                CM: 'Cameroon',
                CR: 'Costa Rica',
                CV: 'Cape Verde',
                CY: 'Cyprus',
                CZ: 'Czech Republic',
                DE: 'Germany',
                DK: 'Denmark',
                DO: 'Dominican Republic',
                DZ: 'Algeria',
                EE: 'Estonia',
                ES: 'Spain',
                FI: 'Finland',
                FO: 'Faroe Islands',
                FR: 'France',
                GB: 'United Kingdom',
                GE: 'Georgia',
                GI: 'Gibraltar',
                GL: 'Greenland',
                GR: 'Greece',
                GT: 'Guatemala',
                HR: 'Croatia',
                HU: 'Hungary',
                IE: 'Ireland',
                IL: 'Israel',
                IR: 'Iran',
                IS: 'Iceland',
                IT: 'Italy',
                JO: 'Jordan',
                KW: 'Kuwait',
                KZ: 'Kazakhstan',
                LB: 'Lebanon',
                LI: 'Liechtenstein',
                LT: 'Lithuania',
                LU: 'Luxembourg',
                LV: 'Latvia',
                MC: 'Monaco',
                MD: 'Moldova',
                ME: 'Montenegro',
                MG: 'Madagascar',
                MK: 'Macedonia',
                ML: 'Mali',
                MR: 'Mauritania',
                MT: 'Malta',
                MU: 'Mauritius',
                MZ: 'Mozambique',
                NL: 'Netherlands',
                NO: 'Norway',
                PK: 'Pakistan',
                PL: 'Poland',
                PS: 'Palestinian',
                PT: 'Portugal',
                QA: 'Qatar',
                RO: 'Romania',
                RS: 'Serbia',
                SA: 'Saudi Arabia',
                SE: 'Sweden',
                SI: 'Slovenia',
                SK: 'Slovakia',
                SM: 'San Marino',
                SN: 'Senegal',
                TN: 'Tunisia',
                TR: 'Turkey',
                VG: 'Virgin Islands, British'
            }
        },
        id: {
            'default': 'Please enter a valid identification number',
            countryNotSupported: 'The country code %s is not supported',
            country: 'Please enter a valid %s identification number',
            countries: {
                BA: 'Bosnia and Herzegovina',
                BG: 'Bulgarian',
                BR: 'Brazilian',
                CH: 'Swiss',
                CL: 'Chilean',
                CZ: 'Czech',
                DK: 'Danish',
                EE: 'Estonian',
                ES: 'Spanish',
                FI: 'Finnish',
                HR: 'Croatian',
                IE: 'Irish',
                IS: 'Iceland',
                LT: 'Lithuanian',
                LV: 'Latvian',
                ME: 'Montenegro',
                MK: 'Macedonian',
                NL: 'Dutch',
                RO: 'Romanian',
                RS: 'Serbian',
                SE: 'Swedish',
                SI: 'Slovenian',
                SK: 'Slovak',
                SM: 'San Marino',
                ZA: 'South African'
            }
        },
        identical: {
            'default': 'Please enter the same value'
        },
        imei: {
            'default': 'Please enter a valid IMEI number'
        },
        integer: {
            'default': 'Please enter a valid number'
        },
        ip: {
            'default': 'Please enter a valid IP address',
            ipv4: 'Please enter a valid IPv4 address',
            ipv6: 'Please enter a valid IPv6 address'
        },
        isbn: {
            'default': 'Please enter a valid ISBN number'
        },
        isin: {
            'default': 'Please enter a valid ISIN number'
        },
        ismn: {
            'default': 'Please enter a valid ISMN number'
        },
        issn: {
            'default': 'Please enter a valid ISSN number'
        },
        lessThan: {
            'default': 'Please enter a value less than or equal to %s',
            notInclusive: 'Please enter a value less than %s'
        },
        mac: {
            'default': 'Please enter a valid MAC address'
        },
        notEmpty: {
            'default': 'Tidak boleh kosong'
        },
        numeric: {
            'default': 'Silahkan masukkan nomor dengan benar'
        },
        phone: {
            'default': 'Silahkan masukkan Nomor HP dengan dengan benar',
            countryNotSupported: 'The country code %s is not supported',
            country: 'Please enter a valid phone number in %s',
            countries: {
                GB: 'United Kingdom',
                US: 'USA'
            }
        },
        regexp: {
            'default': 'Please enter a value matching the pattern'
        },
        remote: {
            'default': 'Please enter a valid value'
        },
        rtn: {
            'default': 'Please enter a valid RTN number'
        },
        sedol: {
            'default': 'Please enter a valid SEDOL number'
        },
        siren: {
            'default': 'Please enter a valid SIREN number'
        },
        siret: {
            'default': 'Please enter a valid SIRET number'
        },
        step: {
            'default': 'Please enter a valid step of %s'
        },
        stringCase: {
            'default': 'Please enter only lowercase characters',
            upper: 'Please enter only uppercase characters'
        },
        stringLength: {
            'default': 'Please enter a value with valid length',
            less: 'Please enter less than %s characters',
            more: 'Please enter more than %s characters',
            between: 'Please enter value between %s and %s characters long'
        },
        uri: {
            'default': 'Please enter a valid URI'
        },
        uuid: {
            'default': 'Please enter a valid UUID number',
            version: 'Please enter a valid UUID version %s number'
        },
        vat: {
            'default': 'Please enter a valid VAT number',
            countryNotSupported: 'The country code %s is not supported',
            country: 'Please enter a valid %s VAT number',
            countries: {
                AT: 'Austrian',
                BE: 'Belgian',
                BG: 'Bulgarian',
                CH: 'Swiss',
                CY: 'Cypriot',
                CZ: 'Czech',
                DE: 'German',
                DK: 'Danish',
                EE: 'Estonian',
                ES: 'Spanish',
                FI: 'Finnish',
                FR: 'French',
                GB: 'United Kingdom',
                GR: 'Greek',
                EL: 'Greek',
                HU: 'Hungarian',
                HR: 'Croatian',
                IE: 'Irish',
                IT: 'Italian',
                LT: 'Lithuanian',
                LU: 'Luxembourg',
                LV: 'Latvian',
                MT: 'Maltese',
                NL: 'Dutch',
                NO: 'Norwegian',
                PL: 'Polish',
                PT: 'Portuguese',
                RO: 'Romanian',
                RU: 'Russian',
                RS: 'Serbian',
                SE: 'Swedish',
                SI: 'Slovenian',
                SK: 'Slovak'
            }
        },
        vin: {
            'default': 'Please enter a valid VIN number'
        },
        zipCode: {
            'default': 'Please enter a valid zip code',
            countryNotSupported: 'The country code %s is not supported',
            country: 'Please enter a valid %s',
            countries: {
                'CA': 'Canadian postal code',
                'DK': 'Danish postal code',
                'GB': 'United Kingdom postal code',
                'IT': 'Italian postal code',
                'NL': 'Dutch postal code',
                'SE': 'Swiss postal code',
                'SG': 'Singapore postal code',
                'US': 'US zip code'
            }
        }
    });
}(window.jQuery));
