import {useForm, usePage} from '@inertiajs/inertia-react'
import React, { useEffect } from 'react'
import {Form, Tab, Tabs} from "react-bootstrap";

export default function EditCityAreaDistrict({close, model, cityAreas}) {

    const {locales} = usePage().props;

    const localeAttr = [];
    locales.forEach((el) => {
        localeAttr[el] = {
            title: ''
        }
    })

    const {data, setData, put, reset, errors} = useForm({
        city_area: model.city_area,
        ...localeAttr
    });

    function setTranslationData (model) {
        if (!model.translations) {
            return
        }
        const localeAttr = [];
        locales.forEach((el) => {
            let title = ''
            if (model.translations) {
                let translation = model.translations.find((tr) => tr.locale === el)
                if (translation) {
                    title = translation.title
                }
            }
            localeAttr[el] = {
                title: title
            }
        })
        return localeAttr;
    }

    const handleLocaleChange = (index, event) => {
        const values = data;
        const updatedValue = event.target.name;
        values[index][updatedValue] = event.target.value;
        setData(values);
    };

    const onChange = (e) => setData({ ...data, [e.target.id]: e.target.value });

    const onSubmit = (e) => {
        e.preventDefault();
        put(route('city-area-districts.update', model.id), {
            data, 
            onSuccess: () => {
                reset(),
                close()
            }, 
        });
    }

    useEffect(() => {
        setData({...data,
            ...setTranslationData(model),
            city_area: model.city_area,
        });
    }, [model]);

    return (
        <>
            <form onSubmit={onSubmit}>
                <div className="modal-body">
                    <div className="form-group">
                        <label htmlFor="title" className="col-form-label">{__('City')}:</label>
                        <Form.Select key={model.id} name={'city_area'} id={'city_area'} value={data.city_area} onChange={onChange} aria-label="Default select example">
                            <option value="">{__('Select City Area')}</option>

                            {cityAreas.map((cityArea) => (
                                <option value={cityArea.id}>{cityArea.title}</option>
                            ))}
                        </Form.Select>
                        {errors && <div className='text-danger mt-1'>{errors.city_area}</div>}
                    </div>
                    <Tabs className="mb-3">
                        {
                            locales.map((locale) => (
                                <Tab eventKey={locale} title={locale} key={locale}>
                                    <div className="form-group">
                                        <label htmlFor="title" className="col-form-label">{__('Title')}:</label>
                                        <input type="text" className="form-control" name={'title'} defaultValue={data[locale] ? data[locale].title : ''}
                                               onChange={(event) =>
                                                   handleLocaleChange(locale, event)
                                               } id="title"/>
                                        {errors && <div className='text-danger mt-1'>{errors[`${locale}.title`]}</div>}
                                    </div>
                                </Tab>
                            ))
                        }
                    </Tabs>
                </div>
                <div className="modal-footer">
                    <button type="button" className="btn bg-gradient-secondary" data-bs-dismiss="modal">{__('Close')}</button>
                    <button type="submit" className="btn bg-gradient-primary">{__('Update')}</button>
                </div>
            </form>
        </>

    )
}
