import {useForm, usePage} from '@inertiajs/inertia-react';
import React, {useEffect, useState} from 'react'
import Base from '../../Layouts/Base'
import {Tab, Tabs} from "react-bootstrap";
import Editor from "../../Components/Ckeditor/Editor";

export default function Profile(props) {
    const {term} = usePage().props;
    const [editorLoaded, setEditorLoaded] = useState(false);

    useEffect(() => {
        setEditorLoaded(true);
    }, []);
    const {locales} = usePage().props;
    const localeAttr = [];
    locales.forEach((el) => {
        localeAttr[el] = {
            content: '',
        }
    })

    const {data, setData, put, reset, errors} = useForm({
        ...localeAttr
    });

    function setTranslationData(model) {
        if (!model.translations) {
            return
        }
        const localeAttr = [];
        locales.forEach((el) => {
            let content = ''
            if (model.translations) {
                let translation = model.translations.find((tr) => tr.locale === el)
                if (translation) {
                    content = translation.content
                }
            }
            localeAttr[el] = {
                content: content,
            }
        })
        return localeAttr;
    }

    const handleLocaleChange = (index, name, editorState) => {
        const values = data;
        values[index][name] = editorState;

        setData(values);
        console.log(editorState)
    };

    const onSubmit = (e) => {
        e.preventDefault();
        put(route('term.update', term.id), {
            data,
            onSuccess: () => {

            },
        });
    }

    useEffect(() => {
        setData({
            ...data,
            ...setTranslationData(term)
        });
    }, [term]);

    return (
        <>
            <div>
                <div className="container-fluid py-4">
                    <div className="row">
                        <div className="col-md-8">
                            <div className="card">
                                <form onSubmit={onSubmit}>
                                    <div className="card-body">
                                        <p className="text-uppercase text-sm">{__('About Information')}</p>
                                        <div className="row">
                                            <div className="col-md-12">
                                                <Tabs className="mb-3">
                                                    {
                                                        locales.map((locale) => (
                                                            <Tab eventKey={locale} title={locale} key={locale}>
                                                                <div className="form-group">
                                                                    <label htmlFor="content" className="col-form-label">{__('Content')}:</label>
                                                                    <Editor
                                                                        name="content"
                                                                        value={data[locale] ? data[locale].content : ''}
                                                                        onChange={(data) => {
                                                                            handleLocaleChange(locale,'content',data)
                                                                        }}
                                                                        editorLoaded={editorLoaded}
                                                                    />
                                                                    {errors && <div className='text-danger mt-1'>{errors[`${locale}.content`]}</div>}
                                                                </div>
                                                            </Tab>
                                                        ))
                                                    }
                                                </Tabs>

                                            </div>
                                        </div>
                                    </div>
                                    <div className="card-header pb-0">
                                        <div className="d-flex align-items-center">
                                            <button type='submit' className="btn btn-primary btn-sm ms-auto">Save
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </>
    )
}

Profile.layout = (page) => <Base children={page} title={__('About')}/>

